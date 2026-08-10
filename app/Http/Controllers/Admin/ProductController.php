<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Brand;
use App\Models\AttributeValue;
use App\Models\ProductVariant;
use App\Models\ProductMedia;
use App\Models\VariantAttributeValue;
use Illuminate\Support\Facades\File;
use App\Models\Address;
use Carbon\Carbon;
use Alert;
use App\Models\CartItem;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $user = Auth::guard('admin')->user();

        $data = Product::query();
        if (!empty($request->search)) {
            $data = $data->where(function ($query) use ($request) {

                return $query
                    ->where(function ($query) use ($request) {
                        return $query
                            ->where('name', 'like', '%' . $request->search . '%');
                    })
                    ->orWhere(function ($query) use ($request) {
                        return $query
                            ->where('email', 'like', '%' . $request->search . '%');
                    })
                    ->orWhere(function ($query) use ($request) {
                        return $query
                            ->where('mobile', 'like', '%' . $request->search . '%');
                    });
            });
        }
        $products = $data->latest()->get();
        return view('admin.products.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::guard('admin')->user();
        $brands = Brand::where('status', 'show')->get();
        $categories = Category::where(['status' => 'show', 'parent_id' => 0])->get();
        $variantAttributes = Attribute::with('attributeValues')->where('status', 'show')->get();
        // $taxes = Tax::where('status', 'Show')->where('company_id',$user->id)->get();
        $types = Type::where('status', 'show')->get();
        return view('admin.products.create', compact('categories', 'brands', 'variantAttributes', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'variant_attributes' => 'required|array',
            'variant_attributes.*' => 'required',
        ]);
        if ($validator->fails()) {
            Alert::toast("Attributes Required", 'warning');
            return redirect()->back()->withInput();
        }
        $product = new Product();
        $product->title = $request->title;
        $product->slug = $this->slugGenerate($request->title, 0);
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $manager = new ImageManager(new Driver());

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $imageName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('products'), $imageName);

            $product->image = 'products/' . $imageName;
        }

        $product->category_id = $request->category_id ?? 0;
        $product->brand_id = $request->brand_id ?? 0;
        $product->status = $request->status;
        $product->hsn_code = $request->hsn_code;
        $product->is_feature = $request->has('is_feature') ? 'yes' : 'no';
        $product->save();

        $variantAttributes = $request->variant_attributes;
        $attributeValues = [];

        foreach ($variantAttributes as $attributeId => $valueNames) {
            foreach ($valueNames as $valueName) {
                $value = AttributeValue::where('name', $valueName)->where('attribute_id', $attributeId)->first();
                if ($value) {
                    $attributeValues[$attributeId][] = [
                        'attribute_id' => $attributeId,
                        'attribute_name' => Attribute::find($attributeId)->name,
                        'value_id' => $value->id,
                        'value_name' => $value->name,
                    ];
                }
            }
        }

        $combinations = $this->cartesian(array_values($attributeValues));
        $variantData = $request->variants;

        foreach ($combinations as $combo) {
            // $comboNames = array_column($combo, 'value_name');

            // $variantKey = implode('_', $comboNames);

            $comboNames = array_column($combo, 'value_name');
            $comboNames = array_map(fn($v) => strtolower(str_replace(' ', '_', $v)), $comboNames);
            $variantKey = implode('_', $comboNames);

            if (!isset($variantData[$variantKey]))
                continue;

            $variantInput = $variantData[$variantKey];

            $skuParts = [$product->slug];
            foreach ($combo as $entry) {
                $skuParts[] = strtoupper($entry['value_name']);
            }
            $sku = strtoupper(implode('_', $skuParts));

            $imagePath = null;
            if ($request->hasFile('variant_image')) {

                $file = $request->file('variant_image');

                $imageName = time() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('products/variants'), $imageName);

                $imagePath = 'products/variants/' . $imageName;
            }

            $variant = ProductVariant::create([
                'product_id' => $product->id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'sku' => $variantInput['sku'],
                'slug' => $sku,
                'product_slug' => $product->slug,
                'actual_price' => $variantInput['actual_price'],
                'price' => $variantInput['sale_price'],
                'weight' => $variantInput['weight'],
                'stock' => $variantInput['stock'],
                'low_stock_alert' => $variantInput['low_stock_alert'],
                'status' => $variantInput['status'],
                'product_min_order' => $variantInput['product_min_order'],
                'product_max_order' => $variantInput['product_max_order'],
                'height' => $variantInput['height'] ?? 0,
                'width' => $variantInput['width'] ?? 0,
                'length' => $variantInput['length'] ?? 0,
                'image' => $imagePath,

            ]);

            foreach ($combo as $entry) {
                VariantAttributeValue::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => $entry['attribute_id'],
                    'attribute_value_id' => $entry['value_id'],
                ]);
            }
        }

        Alert::toast('Product created successfully', 'success');
        return redirect(route('admin.products.index'));
    }


    private function cartesian($arrays)
    {
        $result = [[]];
        foreach ($arrays as $property_values) {
            $tmp = [];
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, [$property_value]);
                }
            }
            $result = $tmp;
        }
        return $result;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['brand', 'category', 'variants'])->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with('variants')->findOrFail($id);
        $categories = Category::where(['status' => 'show', 'parent_id' => 0])->get();
        $brands = Brand::all();
        $variantAttributes = Attribute::with('attributeValues')->get();
        $types = Type::where('status', 'show')->get();

        return view('admin.products.edit', compact('product', 'categories', 'brands', 'variantAttributes', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        // dd($request->allFiles());
        $product = Product::findOrFail($id);
        $oldTitle = $request->title;
        $product->title = $request->title;
        if ($oldTitle != $request->title) {
            $product->slug = $this->slugGenerate($request->title, 0);
        }
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->category_id = $request->category_id ?? 0;
        $product->brand_id = $request->brand_id ?? 0;
        $product->status = $request->status;
        $product->hsn_code = $request->hsn_code;
        $product->is_feature = $request->has('is_feature') ? 'yes' : 'no';
        $manager = new ImageManager(new Driver());

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $imageName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('products'), $imageName);

            $product->image = 'products/' . $imageName;
        }

        $product->save();

        $existingVariants = $request->existing_variants ?? [];
        $dbVariantIds = ProductVariant::where('product_id', $product->id)
            ->pluck('id')
            ->toArray();

        $requestVariantIds = array_column($existingVariants, 'id');
        $deletedVariantIds = array_diff($dbVariantIds, $requestVariantIds);

        if (!empty($deletedVariantIds)) {
            VariantAttributeValue::whereIn('product_variant_id', $deletedVariantIds)->delete();
            ProductVariant::whereIn('id', $deletedVariantIds)->delete();
        }

        // --- Variant Galleries ---
        $variantGalleries = $request->file('variant_gallery', []);   // uploaded files
        $keepVariantGallery = $request->input('keep_variant_gallery', []); // keep existing ids

        foreach ($product->variants as $variant) {
            $keepIds = $keepVariantGallery[$variant->id] ?? [];

            // Delete removed images for this variant
            ProductMedia::where('product_variant_id', $variant->id)
                ->whereNotIn('id', $keepIds)
                ->delete();

            // Add new uploads
            if (isset($variantGalleries[$variant->id])) {
                foreach ($variantGalleries[$variant->id] as $file) {
                    $path = $file->store('products/variants', 'public');
                    $media = new ProductMedia();
                    $media->product_id = $product->id;
                    $media->product_variant_id = $variant->id;
                    $media->url = $path;
                    $media->type = 'image';
                    $media->save();
                }
            }
        }

        if (!empty($existingVariants)) {
            foreach ($existingVariants as $exVariant) {
                $variantModel = ProductVariant::find($exVariant['id']);
                if ($variantModel) {
                    $var = VariantAttributeValue::where('product_variant_id', $variantModel->id)->first();
                    if (!empty($var->id)) {
                        $sku = $product->slug . '_' . $var->value->name ?? '';
                    } else {
                        $sku = $product->slug;
                    }
                    if (isset($exVariant['image']) && $exVariant['image'] instanceof \Illuminate\Http\UploadedFile) {

                        $variantImgName = $product->slug . "_" . strtoupper($variantModel->id) . ".webp";
                        $image = $manager->decode($exVariant['image']); // UploadedFile is supported

                        $image->scale(width: 1200, height: 1600);

                        $image->save(
                            public_path('variants/' . $variantImgName),
                            quality: 100
                        );
                        $variantModel->image = 'variants/' . $variantImgName;
                    }
                    $variantModel->actual_price = $exVariant['actual_price'];
                    $variantModel->price = $exVariant['sale_price'];
                    $variantModel->weight = $exVariant['weight'];
                    $variantModel->height = $exVariant['height'];
                    $variantModel->width = $exVariant['width'];
                    $variantModel->length = $exVariant['length'];
                    $variantModel->stock = $exVariant['stock'];
                    $variantModel->status = $exVariant['status'];
                    $variantModel->category_id = $product->category_id;
                    $variantModel->product_slug = $product->slug;
                    $variantModel->sku = $exVariant['sku'];
                    $variantModel->low_stock_alert = $exVariant['low_stock_alert'];
                    $variantModel->product_min_order = $exVariant['product_min_order'];
                    $variantModel->product_max_order = $exVariant['product_max_order'];
                    $variantModel->save();
                }
            }
        }

        $variantAttributes = $request->variant_attributes ?? [];
        $attributeValues = [];

        foreach ($variantAttributes as $attributeId => $valueNames) {
            foreach ($valueNames as $valueName) {
                $value = AttributeValue::where('name', $valueName)
                    ->where('attribute_id', $attributeId)
                    ->first();
                if ($value) {
                    $attributeValues[$attributeId][] = [
                        'attribute_id' => $attributeId,
                        'attribute_name' => Attribute::find($attributeId)->name,
                        'value_id' => $value->id,
                        'value_name' => $value->name,
                    ];
                }
            }
        }

        $combinations = $this->cartesian(array_values($attributeValues));
        $variantData = $request->variants ?? [];

        foreach ($combinations as $combo) {
            $comboNames = array_column($combo, 'value_name');
            $comboNames = array_map(fn($v) => strtolower(str_replace(' ', '_', $v)), $comboNames);
            $variantKey = implode('_', $comboNames);
            // $comboNames = array_column($combo, 'value_name');
            // $variantKey = implode('_', $comboNames);

            if (!isset($variantData[$variantKey]))
                continue;

            $variantInput = $variantData[$variantKey];

            $skuParts = [$product->slug];
            foreach ($combo as $entry) {
                $skuParts[] = strtoupper($entry['value_name']);
            }
            $sku = strtoupper(implode('_', $skuParts));

            $imagePath = null;
            if (isset($variantInput['image']) && $variantInput['image'] instanceof \Illuminate\Http\UploadedFile) {
                $variantImgName = $sku . ".webp";
                $image = $manager->decode($variantInput['image']); // UploadedFile is supported

                $image->scale(width: 1200, height: 1600);

                $image->save(
                    public_path('variants/' . $variantImgName),
                    quality: 100
                );
                $imagePath = 'variants/' . $variantImgName;
            }
            $videoPath = null;

            // if (isset($variantInput['video']) && $variantInput['video'] instanceof \Illuminate\Http\UploadedFile) {

            //     $file = $variantInput['video'];
            //     // Use original extension
            //     $extension = $file->getClientOriginalExtension();

            //     // Create filename like SKU.mp4
            //     $variantVideoName = $sku . '.' . $extension;

            //     // Delete old video if exists
            //     if ($variant->video && file_exists(public_path($variant->video))) {
            //         unlink(public_path($variant->video));
            //     }

            //     // Move file
            //     $file->move(public_path('media/variants'), $variantVideoName);
            //     $videoPath = 'media/variants/' . $variantVideoName;
            // }

            $vidPath = null;

            // if (isset($variantInput['promotional_video']) && $variantInput['promotional_video'] instanceof \Illuminate\Http\UploadedFile) {

            //     $file = $variantInput['promotional_video'];
            //     // Use original extension
            //     $extension = $file->getClientOriginalExtension();

            //     // Create filename like SKU.mp4
            //     $varVidName = $sku . '.' . $extension;

            //     // Delete old video if exists
            //     if ($variant->promotional_video && file_exists(public_path($variant->promotional_video))) {
            //         unlink(public_path($variant->promotional_video));
            //     }

            //     // Move file
            //     $file->move(public_path('media/variants/promotional/'), $varVidName);
            //     $vidPath = 'media/variants/promotional/' . $varVidName;
            // }


            $variant = ProductVariant::create([
                'product_id' => $product->id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'slug' => $sku,
                'sku' => $variantInput['sku'],
                'product_slug' => $product->slug,
                'actual_price' => $variantInput['actual_price'],
                'price' => $variantInput['sale_price'],
                'weight' => $variantInput['weight'],
                'stock' => $variantInput['stock'],
                'status' => $variantInput['status'],
                'low_stock_alert' => $variantInput['low_stock_alert'],
                'product_min_order' => $variantInput['product_min_order'],
                'product_max_order' => $variantInput['product_max_order'],
                'image' => $imagePath,
                // 'video' => $videoPath,
                // 'promotional_video' => $vidPath,
                'height' => $variantInput['height'],
                'width' => $variantInput['width'],
                'length' => $variantInput['length'],
            ]);

            foreach ($combo as $entry) {
                VariantAttributeValue::create([
                    'product_variant_id' => $variant->id,
                    'attribute_id' => $entry['attribute_id'],
                    'attribute_value_id' => $entry['value_id'],
                ]);
            }
        }


        Alert::toast('Product updated successfully', 'success');
        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $product = Product::with(['variants', 'media'])->find($id);

        if (!$product) {
            Alert::toast('Product not found', 'error');
            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            // 1) Delete main product image
            if (!empty($product->image)) {
                $productImagePath = public_path($product->image);
                if (file_exists($productImagePath)) {
                    @unlink($productImagePath);
                }
            }

            // 2) Delete variants
            foreach ($product->variants as $variant) {
                // Delete variant main image
                if (!empty($variant->image)) {
                    $variantImagePath = public_path($variant->image);
                    if (file_exists($variantImagePath)) {
                        @unlink($variantImagePath);
                    }
                }

                CartItem::where('product_variant_id', $variant->id)->delete();
                WishlistItem::where('product_variant_id', $variant->id)->delete();

                // Delete variant media
                $variantMedias = ProductMedia::where('product_variant_id', $variant->id)->get();
                foreach ($variantMedias as $vm) {
                    if (!empty($vm->url)) {
                        $filePath = public_path($vm->url);
                        if (file_exists($filePath)) {
                            @unlink($filePath);
                        }
                    }
                    $vm->delete();
                }

                // Delete variant attribute values
                VariantAttributeValue::where('product_variant_id', $variant->id)->delete();

                // Delete variant itself
                $variant->delete();
            }

            // 3) Delete product media
            foreach ($product->media as $pm) {
                if (!empty($pm->url)) {
                    $filePath = public_path($pm->url);
                    if (file_exists($filePath)) {
                        @unlink($filePath);
                    }
                }
                $pm->delete();
            }

            // 4) Detach subcategories (pivot table)
            if (method_exists($product, 'subcategories')) {
                $product->subcategories()->detach();
            }

            // 5) Delete product record
            $product->delete();

            DB::commit();

            Alert::toast('Product deleted successfully', 'success');
            return redirect()->route('admin.products.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error('Product delete error: ' . $e->getMessage(), ['product_id' => $id]);
            Alert::toast('Unable to delete product: ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    private function slugGenerate($name, $count)
    {

        if (preg_match("/[\/\\\^£$%&*()}{@#~?><>,|=_+¬-]/", $name)) {
            $name = str_replace(']', '_', $name);
            $name = str_replace('[', '_', $name);
            $name = str_replace("'", '_', $name);
            $pattern = "/[\/\\\^£$%&*()}{@#~?><>,|=_+¬-]/";
            $replacement = "_";

            // Replace special characters with underscores
            $name = preg_replace($pattern, $replacement, $name);
        }
        $slug = ($count == 0) ? strtolower(str_replace(' ', '_', $name)) : strtolower(str_replace(' ', '_', $name)) . $count;

        // Check for uniqueness
        $checkSlug = Product::where('slug', $slug)->exists();
        if (!$checkSlug) {
            return $slug;
        } else {
            // Increment count and retry
            return $this->slugGenerate($name, $count + 1);
        }
    }

    public function getAttributeValues($unitId)
    {
        $attributeValues = AttributeValue::where('attribute_id', $unitId)->get();

        return response()->json($attributeValues);
    }

    public function delete_media($id)
    {
        $media = ProductMedia::findOrFail($id);

        // delete file from public path if exists
        $filePath = public_path($media->url);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted']);
    }

    public function todayDeals(Request $request)
    {
        $data = ProductVariant::where('today_deal', 'yes');
        // if (!empty($request->search)) {
        //     $data = $data->where(function ($query) use ($request) {

        //         return $query
        //             ->where(function ($query) use ($request) {
        //                 return $query
        //                     ->where('title', 'like', '%' . $request->search . '%');
        //             });
        //     });
        // }
        $data = $data->latest()->get();

        $variants = ProductVariant::where('status', 'show')->where('today_deal', 'no')->get();
        return view('admin.products.today_deals', compact('variants', 'data'));
    }

    public function updateTodayDeal(Request $request)
    {
        $variant = ProductVariant::where('id', $request->variant_id)->first();
        if (!isset($variant->id)) {
            Alert::toast("Variant Details Not Found", 'warning');
            return redirect(route('admin.todayDeals'));
        }
        $variant->today_deal = 'yes';
        $variant->save();
        Alert::toast("Deal Added Successfully", 'success');
        return redirect(route('admin.todayDeals'));
    }

    public function deleteTodaySale($id)
    {
        $variation = ProductVariant::where('id', $id)->first();

        if (!$variation) {
            return response()->json([
                'status' => false,
                'message' => 'Sale not found'
            ]);
        }
        $variation->today_deal = 'no';
        $variation->save();
        // Update today_sale_no
        // $variation->update([
        //     'today_deal' => 'no'   // or 0 based on your DB structure
        // ]);

        return response()->json([
            'status' => true,
            'message' => 'Today sale removed successfully'
        ]);
    }


    public function deleteVideo(Request $request)
    {
        $variant = ProductVariant::find($request->id);

        if (!$variant) {
            return response()->json(['success' => false]);
        }

        if ($request->type === 'video') {
            if ($variant->video && file_exists(public_path($variant->video))) {
                unlink(public_path($variant->video));
            }
            $variant->video = null;
        }

        if ($request->type === 'promotional_video') {
            if ($variant->promotional_video && file_exists(public_path($variant->promotional_video))) {
                unlink(public_path($variant->promotional_video));
            }
            $variant->promotional_video = null;
        }

        $variant->save();

        return response()->json(['success' => true]);
    }

    public function bulkProductUpdate(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        if (!isset($product->id)) {
            Alert::toast("Product Details Not Found", 'warning');
            return redirect(route('admin.products.index'));
        }
        $updateData = [];
        if ($request->filled('price')) {
            $updateData['price'] = $request->price;
        }
        if ($request->filled('actual_price')) {
            $updateData['actual_price'] = $request->actual_price;
        }
        if ($request->filled('height')) {
            $updateData['height'] = $request->height;
        }
        if ($request->filled('width')) {
            $updateData['width'] = $request->width;
        }
        if ($request->filled('length')) {
            $updateData['length'] = $request->length;
        }
        if ($request->filled('weight')) {
            $updateData['weight'] = $request->weight;
        }
        if ($request->filled('stock')) {
            $updateData['stock'] = $request->stock;
        }
        if ($request->filled('low_stock_alert')) {
            $updateData['low_stock_alert'] = $request->low_stock_alert;
        }
        if ($request->filled('product_min_order')) {
            $updateData['product_min_order'] = $request->product_min_order;
        }
        if ($request->filled('product_max_order')) {
            $updateData['product_max_order'] = $request->product_max_order;
        }
        if ($request->filled('status')) {
            $updateData['status'] = $request->status;
        }

        if (!empty($updateData)) {
            ProductVariant::where('product_id', $product->id)->update($updateData);
        }
        \RealRashid\SweetAlert\Facades\Alert::toast("Product Details Updated Successfully", 'success');
        return redirect()->back();
    }
}

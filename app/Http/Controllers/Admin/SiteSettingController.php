<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Alert;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SiteSetting::find($id);
        return view('admin.settings.site.all', compact('data'));
    }
    public function site()
    {
        $site = SiteSetting::first();
        return view('admin.settings.site.company', compact('site'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function company_setting_update(Request $request)
    {
        $site = SiteSetting::first();

        if (!$site) {
            $site = new SiteSetting();
        }

        $site->fill($request->except([
            'logo',
            'site_logo',
            'favicon',
            'admin_logo',
            'image'
        ]));

        if ($request->hasFile('logo')) {
            $site->logo = $request->file('logo')->store('site');
        }

        if ($request->hasFile('site_logo')) {
            $site->site_logo = $request->file('site_logo')->store('site');
        }

        if ($request->hasFile('favicon')) {
            $site->favicon = $request->file('favicon')->store('site');
        }

        if ($request->hasFile('admin_logo')) {
            $site->admin_logo = $request->file('admin_logo')->store('site');
        }

        if ($request->hasFile('image')) {
            $site->image = $request->file('image')->store('site');
        }

        $site->save();

        Alert::success('Updated', 'Successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function location(Request $request)
    // {
    //     $siteSetting =SiteSetting::find('1');
    //     $siteSetting->city_id=$request->city_id;
    //     $siteSetting->save();
    //     return redirect()->back();
    // }
}

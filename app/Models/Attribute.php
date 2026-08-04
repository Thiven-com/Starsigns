<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id');
    }

    public function productCount(): int
    {
        return 0;
    }
}
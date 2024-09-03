<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'image'
    ];

    // Category တစ်ခုမှာ Products တစ်ခုထက်မကရှိနိုင် 
    public function products() 
    {
        return $this->hasMany(\App\Models\Product::class);
    }
}

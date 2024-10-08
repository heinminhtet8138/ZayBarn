<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'code_no',
        'name',
        'image',
        'price',
        'discount',
        'description',
        'in_stock',
        'category_id'
    ];

    // Product တစ်ခုမှာ Category တစ်ခု ရှိကို ရှိရမယ် 
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
}

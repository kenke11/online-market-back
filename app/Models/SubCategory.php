<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class SubCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name'
    ];

    protected  $translatable = [
        'name'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_subcategory', 'sub_category_id', 'category_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_subcategory', 'sub_category_id', 'product_id');
    }
}

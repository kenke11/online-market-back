<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'price', 'details'];

    protected  $translatable = [
        'name',
        'details'
    ];

    protected $casts = [
        'details.ka' => 'collection',
        'details.en' => 'collection',
    ];

    public function subCategories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'product_subcategory', 'product_id', 'sub_category_id');
    }
}

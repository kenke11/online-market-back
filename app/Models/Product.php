<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\SlugOptions;
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
        'details' => 'json',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'product_subcategory', 'product_id', 'sub_category_id');
    }

    public function productSpecifications(): HasMany
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function productPictures(): HasMany
    {
        return $this->hasMany(ProductPicture::class);
    }
}

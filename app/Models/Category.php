<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name'
    ];

    public $translatable = ['name'];

    public function subCategories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'category_subcategory', 'category_id', 'sub_category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

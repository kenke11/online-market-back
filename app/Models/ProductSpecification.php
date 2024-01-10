<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class ProductSpecification extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['group_name'];

    protected  $translatable = [
        'group_name',
    ];

    public function specifications(): HasMany
    {
        return $this->hasMany(Specification::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

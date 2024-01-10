<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Specification extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'specification_description'];

    protected  $translatable = [
        'name',
        'specification_description'
    ];

    public function productSpecification(): BelongsTo
    {
        return $this->belongsTo(ProductSpecification::class, 'product_specification_id');
    }
}

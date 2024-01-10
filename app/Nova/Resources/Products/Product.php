<?php

namespace App\Nova\Resources\Products;

use App\Nova\Resource;
use App\Nova\Resources\Categories\Category;
use App\Nova\Resources\Categories\SubCategory;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use OnlineMarket\FlexContent\FlexContent;
use Outl1ne\MultiselectField\Multiselect;
use Spatie\NovaTranslatable\Translatable;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Product>
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Translatable::make([
                Text::make('name')->rules(['required']),
            ]),
            Number::make('Price', 'price')->rules([
                'required',
                'numeric'
            ]),

            BelongsTo::make('Main Category', 'category', Category::class)->nullable(),

            Multiselect::make('Sub Categories', 'subCategories')
                ->belongsToMany(SubCategory::class, false)->hideFromIndex(),

            Translatable::make([
                FlexContent::make('Details', 'details')
                    ->hideFromIndex()
            ]),

            BelongsToMany::make('Sub Categories', 'subCategories', SubCategory::class),
            HasMany::make('Specification Group', 'productSpecifications', ProductSpecification::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}

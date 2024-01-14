<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Locale;

class ProductService
{
    public function getFilteredSpecifications($categorySlug, $subCategorySlug = null): array
    {
        if ($subCategorySlug)
        {
            $category = $this->getSubCategoryWithSpecifications($categorySlug, $subCategorySlug);
        } else {
            $category = $this->getCategoryWithSpecifications($categorySlug);
        }
        $groupedSpecifications = $this->groupSpecificationsByProduct($category);

        return array_values($groupedSpecifications);
    }

    private function getCategoryWithSpecifications($categorySlug)
    {
        return Category::where('slug', $categorySlug)
            ->with(['products.productSpecifications.specifications'])
            ->firstOrFail();
    }

    private function getSubCategoryWithSpecifications($categorySlug, $subCategorySlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->with(['subCategories'])
            ->firstOrFail();

        return  $category->subCategories()
            ->where('slug', $subCategorySlug)
            ->with(['products' => function ($query) use ($categorySlug) {
                $query->whereHas('category', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                })->with('productSpecifications.specifications');
            }])
            ->firstOrFail();
    }

    private function groupSpecificationsByProduct($category)
    {
        $groupedSpecifications = [];
        $locales = Locale::all()->pluck('code')->toArray();

        foreach ($category->products as $product) {
            $this->groupProductSpecifications($product, $groupedSpecifications, $locales);
        }

        return $groupedSpecifications;
    }

    private function groupProductSpecifications($product, &$groupedSpecifications, $locales): void
    {
        foreach ($product->productSpecifications as $productSpecification) {
            foreach ($productSpecification->specifications as $specification) {
                $specificationName = $specification->name;
                $isColor = $specification->is_color;
                $value = $isColor ? $specification->color_value : $specification->specification_description;

                if (!isset($groupedSpecifications[$specificationName])) {
                    $groupedSpecifications[$specificationName] = [
                        'name' => $specification->getTranslations('name', $locales),
                        'specifications' => [],
                    ];
                }

                $found = false;

                foreach ($groupedSpecifications[$specificationName]['specifications'] as $existingSpecification) {
                    $existingIsColor = $existingSpecification->is_color;
                    $existingValue = $existingIsColor ? $existingSpecification->color_value : $existingSpecification->specification_description;

                    if (($isColor && $existingIsColor && $value == $existingValue) ||
                        (!$isColor && !$existingIsColor && $value == $existingValue)) {
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $groupedSpecifications[$specificationName]['specifications'][] = $specification;
                }
            }
        }
    }
}

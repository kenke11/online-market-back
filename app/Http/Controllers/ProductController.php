<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function getProductsByCategory($category): JsonResponse
    {
        $category = Category::where('slug', $category)
            ->with(['products.productSpecifications.specifications', 'products.productPictures'])
            ->firstOrFail();

        $products = $category->products;

        return response()->json([
            'products' => $products
        ]);
    }

    public function getProductFilterByCategory($category): JsonResponse
    {
        $productService = new ProductService();
        $filteredSpecifications = $productService->getFilteredSpecifications($category);

        return response()->json([
            'filters' => $filteredSpecifications,
        ]);
    }

    public function getProductsBySubCategory($category, $subCategory): JsonResponse
    {
        $category = Category::where('slug', $category)
            ->with('subCategories')
            ->firstOrFail();

        $subCategory = $category->subCategories()
            ->where('slug', $subCategory)
            ->with(['products' => function ($query) use ($category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('slug', $category->slug);
                })->with(['productSpecifications.specifications', 'productPictures']);
            }])
            ->firstOrFail();

        $products = $subCategory->products;

        return response()->json([
            'products' => $products
        ]);
    }

    public function getProductFilterBySubCategory($category, $subCategory): JsonResponse
    {
        $productService = new ProductService();
        $filteredSpecifications = $productService->getFilteredSpecifications($category, $subCategory);

        return response()->json([
            'filters' => $filteredSpecifications,
        ]);
    }
}

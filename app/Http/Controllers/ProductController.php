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
            ->with('products.productSpecifications.specifications')
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

}

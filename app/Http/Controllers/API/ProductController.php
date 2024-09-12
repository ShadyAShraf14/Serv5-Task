<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function all()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function get_one($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return new ProductResource($product);
    }
}

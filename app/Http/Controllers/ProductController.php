<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New product created',
            'data' => [
                'product' => $product
            ]
        ], 201);
    }

    public function read($product_id)
    {
        $product = Product::find($product_id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'product' => $product
            ]
        ]);
    }

        public function readAll()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'data' => [
                'products' => $products
            ]
        ]);
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Product updated',
            'data' => [
                'product' => $product
            ]
        ]);
    }

    public function delete($product_id)
    {
        $product = Product::find($product_id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted',
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index($product_id)
    {
        // return $product_id;
        $product = Product::where('id', $product_id)->with('category')->first();
        $product_colors = explode(',', $product->product_color);
        $product_sizes = explode(',', $product->product_size);
        $related_products = Product::active()->where('category_id', $product->category->id)->whereNotIn('id', [$product->id])->inRandomOrder()->limit(5)->get();
        return view('frontend.single_product', compact('product', 'product_colors', 'product_sizes', 'related_products'));
    }
}

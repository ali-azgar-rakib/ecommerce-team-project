<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Util\CustomMessage;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add_cart(Product $product)
    {
        $price = $product->selling_price;
        $discount = $product->discount_price ? ($product->selling_price - $product->discount_price) / $product->selling_price * 100 : 0;
        $cart = Cart::add($product->id, $product->product_name, 1, $price, 1, ['image' => $product->image_one, 'color' => '', 'size' => '']);
        Cart::setDiscount($cart->rowId, $discount);
        $notification = CustomMessage::customMessage('Cart Added Successfully', 'success');
        return response()->json($notification, 200);
    }

    public function add_cart_from_post_req(Request $request, Product $product)
    {
        $request->validate([
            'product_color' => 'required',
            'product_size' => 'required',
            'quantity' => 'required | integer'
        ]);
        $price = $product->selling_price;
        $discount = $product->discount_price ? ($product->selling_price - $product->discount_price) / $product->selling_price * 100 : 0;
        $cart = Cart::add($product->id, $product->product_name, $request->quantity, $price, 1, ['image' => $product->image_one, 'color' => $request->product_color, 'size' => $request->product_size]);
        Cart::setDiscount($cart->rowId, $discount);
        $notification = CustomMessage::customMessage('Cart Added Successfully', 'success');
        return back()->with($notification);
    }

    public function cart_content()
    {
        return Cart::content();
    }
}

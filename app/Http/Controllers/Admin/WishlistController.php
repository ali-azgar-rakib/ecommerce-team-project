<?php

namespace App\Http\Controllers\Admin;

use App\Util\CustomMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add_wishlist($id)
    {
        if (Auth::check()) {
            if (Auth::user()->wishlists()->where('product_id', $id)->count() == 0) {
                Auth::user()->wishlists()->attach($id);
                $notification = CustomMessage::customMessage('Added Successfully!', 'success');
                return response()->json($notification);
            } else {
                $notification = CustomMessage::customMessage('Already Exists!', 'info');
                return response()->json($notification);
            }
        } else {
            $notification = CustomMessage::customMessage('Login Frist', 'info');
            return  response()->json($notification);
        }
    }
}

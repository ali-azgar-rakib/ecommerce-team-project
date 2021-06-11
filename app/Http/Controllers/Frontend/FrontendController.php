<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\NewsLatter;
use App\Models\Product;
use App\Util\CustomMessage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index()
    {
        $categories = Category::with('sub_categories')->get();
        $main_slider = Product::where('status', 1)->where('main_slider', 1)->inRandomOrder()->limit(1)->first();
        $trends = Product::where('status', 1)->where('trend', 1)->inRandomOrder()->get();
        $onsales = Product::where('status', 1)->inRandomOrder()->get();
        $best_rateds = Product::where('status', 1)->where('best_rated', 1)->inRandomOrder()->get();
        $hot_deals = Product::where('status', 1)->where('hot_deal', 1)->with('brand')->inRandomOrder()->get();
        $mid_sliders = Product::where('status', 1)->where('mid_slider', 1)->with(['brand', 'category'])->inRandomOrder()->limit(3)->get();
        return view('frontend.index', compact('categories', 'main_slider', 'trends', 'onsales', 'best_rateds', 'hot_deals', 'mid_sliders'));
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        NewsLatter::create($request->only('email'));
        $notification = CustomMessage::customMessage('Successfully', 'success');
        return back()->with($notification);
    }
}

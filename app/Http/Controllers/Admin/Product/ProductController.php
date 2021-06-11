<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Util\CustomMessage;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $image_one        = $request->image_one;
        $image_two        = $request->image_two;
        $image_three      = $request->image_three;
        $image_one_name   = '';
        $image_two_name   = '';
        $image_three_name = '';
        if (!empty($image_one)) {
            $image_one_name = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->fit(300, 300)->save('img/media/products/' . $image_one_name);
        }
        if (!empty($image_two)) {
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->fit(300, 300)->save('img/media/products/' . $image_two_name);
        }
        if (!empty($image_three)) {
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->fit(300, 300)->save('img/media/products/' . $image_three_name);
        }


        Product::create($request->only(
            'category_id',
            'sub_category_id',
            'brand_id',
            'product_name',
            'product_details',
            'product_code',
            'product_quantity',
            'product_color',
            'product_size',
            'selling_price',
            'discount_price',
            'video_link',
            'main_slider',
            'hot_deal',
            'best_rated',
            'mid_slider',
            'hot_new',
            'trend',
            'status',
            'bogo'
        ) + ['status' => 1, 'image_one' => $image_one_name, 'image_two' => $image_two_name, 'image_three' => $image_three_name]);
        $notification = CustomMessage::customMessage('Product Added', 'success');
        return redirect()->route('admin.product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->with(['category', 'sub_category', 'brand'])->first();
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::where('id', $id)->with(['category', 'sub_category', 'brand'])->first();
        return view('admin.product.edit', compact('categories', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $image_one_name   = $product->image_one;
        $image_two_name   = $product->image_two;
        $image_three_name = $product->image_three;
        $image_one        = $request->image_one;
        $image_two        = $request->image_two;
        $image_three      = $request->image_three;

        if (!empty($image_one)) {
            if (file_exists("img/media/products/" . $image_one_name)) {
                unlink('img/media/products/' . $image_one_name);
            }

            $image_one_name = uniqid() . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->fit(300, 300)->save('img/media/products/' . $image_one_name);
        }
        if (!empty($image_two)) {
            if (file_exists("img/media/products/" . $image_two_name)) {
                unlink('img/media/products/' . $image_two_name);
            }
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->fit(300, 300)->save('img/media/products/' . $image_two_name);
        }
        if (!empty($image_three)) {
            if (file_exists("img/media/products/" . $image_three_name)) {
                unlink('img/media/products/' . $image_three_name);
            }
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->fit(300, 300)->save('img/media/products/' . $image_three_name);
        }


        $product->update($request->only(
            'category_id',
            'sub_category_id',
            'brand_id',
            'product_name',
            'product_details',
            'product_code',
            'product_quantity',
            'product_color',
            'product_size',
            'selling_price',
            'discount_price',
            'video_link',
            'main_slider',
            'hot_deal',
            'best_rated',
            'mid_slider',
            'hot_new',
            'trend',
            'status',
            'bogo'
        ) + ['status' => 1, 'image_one' => $image_one_name, 'image_two' => $image_two_name, 'image_three' => $image_three_name]);
        $notification = CustomMessage::customMessage('Updated ', 'success');
        return redirect()->route('admin.product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $image_one = $product->image_one;
        $image_two = $product->image_two;
        $image_three = $product->image_three;
        if ($image_one && file_exists("img/media/products/" . $image_one)) {
            unlink('img/media/products/' . $image_one);
        }
        if ($image_two && file_exists("img/media/products/" . $image_two)) {
            unlink('img/media/products/' . $image_two);
        }
        if ($image_three && file_exists("img/media/products/" . $image_three)) {
            unlink('img/media/products/' . $image_three);
        }

        $product->delete();
        $notification = CustomMessage::customMessage('Product Deleted', 'success');
        return back()->with($notification);
    }


    public function changeStatus(Product $product)
    {
        if ($product->status == 1) {
            $product->status = 0;
            $product->save();
        } else {
            $product->status = 1;
            $product->save();
        }
        $notification = CustomMessage::customMessage('Status Chang', 'success');
        return back()->with($notification);
    }
}

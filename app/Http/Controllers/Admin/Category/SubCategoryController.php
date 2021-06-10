<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::with('category')->get();
        return view('admin.sub_category.index', compact('categories', 'sub_categories'));
    }

    public function getSubCategoryByCategoryId($categoryId)
    {
        $sub_categories = SubCategory::where('category_id', $categoryId)->get();
        return json_encode($sub_categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required',
        ]);

        SubCategory::create($request->only('category_id', 'sub_category_name'));
        $notification = [
            'message' => 'Sub Category Added Successfully',
            'status' => 'success'
        ];

        return back()->with($notification);
    }

    public function edit(Category $category)
    {
        return $category;
    }


    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();
        $notification = [
            'message' => 'Sub Category Deleted Successfully',
            'status' => 'Success'
        ];
        return back()->with($notification);
    }
}

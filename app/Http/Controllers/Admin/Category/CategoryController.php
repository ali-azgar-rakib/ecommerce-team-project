<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required | unique:categories'
        ]);

        Category::create($request->only('category_name'));
        $data = [
            'message' => 'Category Created Successfully',
            'alert-type' => 'success'
        ];

        return back()->with($data);
    }
}

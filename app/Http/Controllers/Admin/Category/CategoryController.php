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

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function udpated(Request $request)
    {


        $category = Category::findOrFail($request->id);
        $category->category_name = $request->category_name;
        if ($category->save()) {
            return back()->with('message', "Category Update succesfully");
        }
    }
    public function destroy($id)
    {
        return $id;
    }
}

<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;

class CategoryComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::with('sub_categories')->get();
        $view->with('categories', $categories);
    }
}
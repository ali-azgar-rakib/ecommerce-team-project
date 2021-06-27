<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;

class HomePageComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::check()) {
            $wishlist_count = Auth::user()->wishlists()->count();
        } else {
            $wishlist_count = 0;
        }
        $view->with('wishlist_count', $wishlist_count);
    }
}

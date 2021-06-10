<?php

namespace App\Http\Controllers\Admin\NewsLatter;

use App\Http\Controllers\Controller;
use App\Models\NewsLatter;
use Illuminate\Http\Request;

class NewsLatterController extends Controller
{
    public function index()
    {
        $newslatters = NewsLatter::latest()->get();
        return view('admin.newslatter.index', compact('newslatters'));
    }
}

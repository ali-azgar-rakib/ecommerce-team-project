<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsLatter;
use App\Util\CustomMessage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
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

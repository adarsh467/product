<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $comments = Post::find(1)->comments;
        $products = Product::where('status', 1)->limit(8)->get(['id', 'name', 'price', 'image', 'img_path', 'has_addon_cat']);

        return view('user.home', compact('products'));
    }
}

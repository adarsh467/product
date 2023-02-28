<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'image', 'img_path', 'has_addon_cat')
                        ->where('status', 1)
                        // ->inRandomOrder()
                        ->paginate(20);

        return view('user.product.all', compact('products'));
    }

    public function showProduct($id)
    {
        try {
            $decId = Crypt::decryptString($id);
            // $product = Product::where('id', $decId)->first(['id', 'name', 'price', 'image', 'img_path', 'has_addon_cat', 'status']);
            // $product = Product::find($decId)->addonCat1();
            $product = Product::join('addon_cat_1 as ac1', 'ac1.product_id', '=', 'products.id')
                        ->where('products.id', $decId)
                        ->first(['products.id', 'products.name', 'products.price', 'products.image', 'products.img_path', 
                            'products.has_addon_cat', 'products.status', 'ac1.name as ac1_name']);
        } catch (DecryptException $e) {
            return back()->with('error', 'Something not good, we are trying our best to resolve it. Please try again later!');
        }

        return view('user.product.details', compact('product'));
    }
}

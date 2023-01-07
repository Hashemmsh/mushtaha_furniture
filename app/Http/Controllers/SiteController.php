<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $products =Product::orderByDesc('id')->offset(3)->take(6)->get();
        return view('site.index' , compact('products'));
    }

    public function category()
    {
        $categories  = Category::orderByDesc('id')->get();
        return view('site.categories' , compact('categories'));
    }
    public function product()
    {
        $products  = Product::orderByDesc('id')->paginate(10);

        return view('site.product' , compact('products'));
    }
}

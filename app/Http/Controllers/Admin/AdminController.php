<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $c_count=Category::count();
        $p_count=Product::count();
        $po_count= Post::count();
      return view('admin.index',compact('c_count','p_count','po_count'));
    }
}

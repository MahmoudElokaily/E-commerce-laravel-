<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Mail\verificationEmail;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->with('Category')->limit(3)->get();
        $categories = Category::limit(3)->get();
        $lastestProducts = Product::orderBy('Created_at' , 'DESC')->limit(3)->get();
        return view('pages.home' , ['products' => $products , 'categories' => $categories , 'lastestProducts' => $lastestProducts]);
    }

    public function showCategoryItem($id){
        $category = Category::find($id);
        $products = $category->products;
        return view('pages.category' , ['category' => $category , 'products' => $products]);
    }

    public function aboutUs(){
        return view('pages.about_us');
    }

    public function allCategories(){
        $categories = Category::all();
        return view('pages.allCategories' , compact('categories'));
    }

    public function myCart($user_id){
        $user = User::find($user_id);
        $products = $user->products;
        return view('pages.my_cart');
    }
}

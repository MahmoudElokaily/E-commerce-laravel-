<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use ImageTrait;
    public function addProduct(){
        $categories = Category::all();
        return view('admin.addProduct' , compact('categories'));
    }

    public function storeProduct(Request $request){

        $file_name = $this->saveImage($request->image , 'images/products');


        Product::create([
            'name' => $request->name,
            'description' => $request->des,
            'price' => $request->price,
            'category_id' => $request->category,
            'image' => $file_name,
        ]);
        return redirect()->back();
    }

    public function addCategory(){
        return view('admin.addCategory');
    }

    public function storeCategory(Request $request){
        $file_name = $this->saveImage($request->image , 'images/categories');
        Category::create([
            'name' => $request->name,
            'image' => $file_name,
        ]);
        return redirect()->back();
    }

}


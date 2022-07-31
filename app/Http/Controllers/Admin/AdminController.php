<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryRequest;
use App\Http\Requests\NewProductRequest;
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

    public function storeProduct(NewProductRequest $request){
        $fields = $request->validated();
        $file_name = $this->saveImage($fields['image'] , 'images/products');
        Product::create([
            'name' => $fields['name'],
            'description' => $fields['description'],
            'price' => $fields['price'],
            'category_id' => $fields['category'],
            'image' => $file_name,
        ]);
        return redirect()->back()->with('success' , 'Product added successfully');
    }

    public function addCategory(){
        return view('admin.addCategory');
    }

    public function storeCategory(NewCategoryRequest $request){
        $fields = $request->validated();
        $file_name = $this->saveImage($fields['image'] , 'images/categories');
        Category::create([
            'name' => $fields['name'],
            'image' => $file_name,
        ]);
        return redirect()->back()->with('success' , 'Category added successfully');
    }

}


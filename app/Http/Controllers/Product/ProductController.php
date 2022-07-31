<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserData;
use App\Mail\ContactUsMail;
use App\Mail\verificationEmail;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\User_Products;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    use ImageTrait;
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
        return view('pages.my_cart' , compact('products'));
    }

    public function addToMyCart($product_id){
        $user = Auth::user();
        $user->products()->attach($product_id);
        return redirect()->back();
    }

    public function myProfile(){
        return view('pages.profile');
    }

    public function updateUser(Request $request , $user_id){
        $user = User::find($user_id);
        $user->update($request->except(('image')));
        if ($request->image){
            $file_name = $this->saveImage($request->image ,'images/users');
            $user->update([
                'photo' =>$file_name
            ]);
        }
        return redirect()->back();
    }

    public function contactUs(){
        return view('pages.contact-us');
    }

    public function sendMailContactUs(Request $request){
        $data = [
            'name' => $request->name,
            'subject' => $request->subject,
        ];
        Mail::to([Auth::user()->email , 'mahmoudelokaily3@gmail.com'])->send(new ContactUsMail($data));
        return redirect()->back()->with('sucess' , 'Mail sent successfully');
    }

    public function checkout($id)
    {
        $product = Product::find($id);
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51KWi8hIM9C2BYrKZw7mmt0KmgZ9VwJuZeHNcUbTWx4KQwXcmAcdVIdvQlVBvgZ59mH3QHPbuDtOY9q4lb9SBHch300vIEAQQtH');

        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'USD',
            'description' => 'Payment From Codehunger',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        return view('pages.credit-card',compact('intent'))->with('product' , $product);

    }

    public function checkoutDone($id)
    {
        Product::destroy($id);
        return view('pages.success');
    }
}

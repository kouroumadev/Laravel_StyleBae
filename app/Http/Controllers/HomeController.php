<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->user_type == 1){
            $prods = Product::where('user_id', auth()->user()->id)->get();
            return view('product.index',compact('prods'));
        } else {
            $prods = Product::all()->take(3);
            return view('home.index',compact('prods'));
        }

    }

    public function showAllBrands()
    {
        $prods = Product::all();
        return view('home.byBrand', compact('prods'));
    }

    public function show(Product $product)
    {
        $user = $product->user;
        $services = $product->services;
        return view('home.show', compact('product','services','user'));
    }

    public function showByType($type)
    {
        $services = service::where('type', $type)->get();
        //dd($prodId);
        return view('home.byType', compact('services'));
    }

    public function showByGender($gender)
    {
        $products = Product::where('gender', $gender)->get();
        //dd($prodId);
        return view('home.byGender', compact('products'));
    }
}

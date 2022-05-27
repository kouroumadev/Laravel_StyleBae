<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\user;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = Product::where('user_id', auth()->user()->id)->get();
        //dd($prods);
        return view('product.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd(auth()->user()->id);
        $logoname = $request->file('logo')->getClientOriginalName();
        $filename1 = $request->file('image1')->getClientOriginalName();
        $filename2 = $request->file('image2')->getClientOriginalName();

        $request->file('logo')->storeAs('images',$logoname,'public');
        $request->file('image1')->storeAs('images',$filename1,'public');
        $request->file('image2')->storeAs('images',$filename2,'public');


        $prod = new product();
        $prod->user_id = auth()->user()->id;
        $prod->name = $request['name'];
        $prod->type = $request['type'];
        $prod->gender = $request['gender'];
        $prod->location = $request['location'];
        $prod->detail = $request['detail'];
        $prod->date1 = $request['date1'];
        $prod->date2 = $request['date2'];
        $prod->logo = $logoname;
        $prod->image1 = $filename1;
        $prod->image2 = $filename2;

        $prod->save();

         return redirect(route('product.index'))->with('yes','Bussiness added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $user = $product->user;
        $services = $product->services;
        //dd($user);
        return view('product.show', compact('product','user','services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }

    public function showApp(Product $product)
    {
        return view('product.showApp', compact('product'));
    }
}

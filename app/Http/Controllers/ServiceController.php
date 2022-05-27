<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\Product;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        //dd($product->services->toArray());

        $datas = array(
            "Hair Cut",
            "Facial",
            "Face Mask",
            "Threading",
            "Waxing",
            "Body Massage"
            );
        $allServices = $product->services->toArray();
        $services = array();

        foreach($allServices as $s){
            array_push($services, $s['type']);
        }


        //dd($services);
        return view('services.create', compact('services','datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new service();
        $service->product_id = $request['product_id'];
        $service->type = $request['type'];
        $service->price = $request['price'];
        $service->image = $request['type']. ".jpg";

        $service->save();

        return redirect()->back()->with('yes','service added with success!!');

        //dd($service);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        return view('services.create', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service $service)
    {

        //dd($service->product->user_id);
        //dd($request->all());
        $product = $service->product;
        $user = $service->product->user;
        $prod_id = $service->product->id;

        $services = Service::where('product_id', $prod_id)->get();

        $service->update([
            'type' => $request['type'],
            'price' => $request['price'],
            'image' => $request['type']. ".jpg"
        ]);

        return redirect()->route('product.show', [
            'product' => $product,
            'user' => $user,
            'services' => $services
        ]);

        //return redirect()->back()->with('yes','Service updated with success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        $service->delete();

        return redirect()->back();

    }
}

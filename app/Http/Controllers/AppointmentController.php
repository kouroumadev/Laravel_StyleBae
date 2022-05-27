<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\job;

class AppointmentController extends Controller
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
        $apps = auth()->user()->appointments;

        return view('appointment.index', compact('apps'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $prod = $product;
        $user = $product->user;
        $services = $product->services;
        return view('appointment.create', compact('prod','user','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $appointment = new appointment();
        $appointment->user_id = auth()->user()->id;
        $appointment->product_id = $request->product_id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();
        $lastID = $appointment->id;

        foreach($request->services as $s)
        {
            $job = new Job();
            $job->appointment_id = $lastID;
            $job->service_id = $s;
            $job->save();
        }

        $apps = auth()->user()->appointments;
        return redirect()->route('appointment.index', [
            'apps' => $apps
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(appointment $appointment)
    {
        //
    }

    public function showAll()
    {
        //$appointment = auth()->user()->appointments;
        //dd('aa');

        return view('appointment.showAll');
    }
}

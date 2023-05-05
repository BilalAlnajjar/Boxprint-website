<?php

namespace App\Http\Controllers;

use App\Models\PayamentMethod;
use Illuminate\Http\Request;

class PayamentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payament = PayamentMethod::first();

        return view('pages.admin.setting-payment',[
            'payament' => $payament,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PayamentMethod::create($request->all());

        return redirect()->route('setting-payament.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayamentMethod  $payamentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PayamentMethod $payamentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayamentMethod  $payamentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PayamentMethod $payamentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayamentMethod  $payamentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $payment = PayamentMethod::first();
        $payment->update($request->all());

        return redirect()->route('pages.setting-payament.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayamentMethod  $payamentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayamentMethod $payamentMethod)
    {
        //
    }
}

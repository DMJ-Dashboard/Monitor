<?php

namespace App\Http\Controllers;

use App\Models\Customerlog;
use Illuminate\Http\Request;

class CustomerlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['custlog'] = Customerlog::all();
        // return view('das.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customerlog  $customerlog
     * @return \Illuminate\Http\Response
     */
    public function show(Customerlog $customerlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customerlog  $customerlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Customerlog $customerlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customerlog  $customerlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customerlog $customerlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customerlog  $customerlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customerlog $customerlog)
    {
        //
    }
}

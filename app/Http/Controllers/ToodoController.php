<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToodoRequest;
use App\Http\Requests\UpdateToodoRequest;
use App\Models\Toodo;

class ToodoController extends Controller
{
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreToodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToodoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toodo  $toodo
     * @return \Illuminate\Http\Response
     */
    public function show(Toodo $toodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toodo  $toodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Toodo $toodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToodoRequest  $request
     * @param  \App\Models\Toodo  $toodo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToodoRequest $request, Toodo $toodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toodo  $toodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toodo $toodo)
    {
        //
    }
}

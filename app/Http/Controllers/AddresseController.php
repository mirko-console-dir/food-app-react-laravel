<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddresseRequest;
use App\Http\Requests\UpdateAddresseRequest;
use App\Models\Addresse;

class AddresseController extends Controller
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
     * @param  \App\Http\Requests\StoreAddresseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddresseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return \Illuminate\Http\Response
     */
    public function show(Addresse $addresse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return \Illuminate\Http\Response
     */
    public function edit(Addresse $addresse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddresseRequest  $request
     * @param  \App\Models\Addresse  $addresse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddresseRequest $request, Addresse $addresse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Addresse  $addresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addresse $addresse)
    {
        //
    }
}

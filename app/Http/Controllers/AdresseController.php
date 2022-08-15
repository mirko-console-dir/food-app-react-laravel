<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdresseRequest;
use App\Http\Requests\UpdateAdresseRequest;
use App\Models\Adresse;

class AdresseController extends Controller
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
     * @param  \App\Http\Requests\StoreAdresseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdresseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function show(Adresse $adresse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function edit(Adresse $adresse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdresseRequest  $request
     * @param  \App\Models\Adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdresseRequest $request, Adresse $adresse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adresse $adresse)
    {
        //
    }
}

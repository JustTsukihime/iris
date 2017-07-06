<?php

namespace App\Http\Controllers;

use App\InfoScreen;
use App\InfoScreenSlide;
use Illuminate\Http\Request;

class InfoScreenController extends Controller
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
     * @param  \App\InfoScreen  $infoScreen
     * @return \Illuminate\Http\Response
     */
    public function show(InfoScreen $infoScreen)
    {
        return view('layouts.infoscreen');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoScreen  $infoScreen
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoScreen $infoScreen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoScreen  $infoScreen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoScreen $infoScreen)
    {
        //
    }

    public function getUpdates() {
        return ['Pages' => InfoScreenSlide::all()];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoScreen  $infoScreen
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoScreen $infoScreen)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\InfoScreenSlide;
use Illuminate\Http\Request;

class InfoScreenSlideController extends Controller
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
        $this->validate($request, [
            'info_screen_id' => 'required|exists:info_screens,id',
            'name' => 'required',
            'content' => 'required|image|max:2000'
        ]);

        $path = $request->file('content')->storePublicly('slides', 'public');

        InfoScreenSlide::create(array_merge($request->only(['info_screen_id', 'name']), ['url' => $path]));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoScreenSlide  $infoScreenSlide
     * @return \Illuminate\Http\Response
     */
    public function show(InfoScreenSlide $infoScreenSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoScreenSlide  $infoScreenSlide
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoScreenSlide $infoScreenSlide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoScreenSlide  $infoScreenSlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoScreenSlide $infoScreenSlide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoScreenSlide  $infoScreenSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoScreenSlide $infoScreenSlide)
    {
        //
    }
}

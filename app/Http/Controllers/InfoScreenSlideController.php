<?php

namespace App\Http\Controllers;

use App\InfoScreen;
use App\InfoScreenSlide;
use App\InfoScreenSlideShow;
use Illuminate\Http\Request;

class InfoScreenSlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
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
    public function store(Request $request, Infoscreen $infoscreen)
    {
        $this->validate($request, [
            'name' => 'required',
            'slide_show' => 'required|exists:info_screen_slide_shows,id',
            'content' => 'required|image|max:2000'
        ]);

        $path = $request->file('content')->storePublicly('slides', 'public');

        $slide = $infoscreen->slides()->create(array_merge($request->only(['name']), ['url' => $path]));
        InfoScreenSlideShow::findOrFail($request->slide_show)->slides()->attach($slide);
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
    public function destroy(InfoScreenSlide $slide)
    {
        $slide->delete();
        return back();
    }
}

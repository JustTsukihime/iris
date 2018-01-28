<?php

namespace App\Http\Controllers;

use App\InfoScreen;
use App\InfoScreenSlide;
use App\InfoScreenSlideShow;
use Illuminate\Http\Request;

class InfoScreenController extends Controller
{
    /**
     * InfoScreenController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'getUpdates']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.infoscreen.index', ['infoScreens' => InfoScreen::all()]);
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
            'name' => 'required',
            'url' => 'required',
        ]);

        $is = InfoScreen::create(request(['name', 'url']));
        return redirect()->route('infoscreen.edit', $is->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoScreen  $infoscreen
     * @return \Illuminate\Http\Response
     */
    public function show(InfoScreen $infoscreen)
    {
        return view('layouts.infoscreen', compact('infoscreen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoScreen  $infoscreen
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoScreen $infoscreen)
    {
        $slideshows = $infoscreen->slideShows()->get();
        return view('layouts.infoscreen.edit', compact(['infoscreen', 'slideshows']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoScreen  $infoScreen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoScreen $infoscreen)
    {
        //
    }

    /**
     * @param InfoScreen $infoscreen
     * @return array
     *
     * TODO: change slides() to active slideshow.
     */
    public function slides(InfoScreen $infoscreen) {
        return ['Pages' => $infoscreen->slides()->get()];
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

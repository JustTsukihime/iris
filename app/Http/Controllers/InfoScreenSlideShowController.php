<?php

namespace App\Http\Controllers;

use App\InfoScreen;
use App\InfoScreenSlideShow;
use Illuminate\Http\Request;

/**
 * Class InfoScreenSlideShowController
 * @package App\Http\Controllers
 */
class InfoScreenSlideShowController extends Controller
{
    /**
     * InfoScreenSlideShowController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InfoScreen $infoscreen)
    {
        $slideshows = $infoscreen->slideShows()->get();
        return view('layouts.slideshow.index', compact(['infoscreen', 'slideshows']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\InfoScreen $infoscreen
     * @return \Illuminate\Http\Response
     */
    public function create(InfoScreen $infoscreen)
    {
        return view('layouts.slideshow.create', compact('infoscreen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, InfoScreen $infoscreen)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $slideshow = $infoscreen->slideShows()->create($request->only(['name']));
        return redirect()->route('slideshow.show', ['slideshow' => $slideshow, 'url' => $infoscreen]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoScreenSlideShow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function show(InfoScreen $infoscreen, InfoScreenSlideShow $slideshow)
    {
        $slides = $slideshow->slides()->get();
        return view('layouts.slideshow.show', compact(['infoscreen', 'slideshow', 'slides']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoScreenSlideShow  $infoScreenSlideShow
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoScreenSlideShow $infoScreenSlideShow)
    {
        return view('layouts.slideshows.edit', compact('infoScreenSlideShow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoScreenSlideShow  $infoScreenSlideShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoScreenSlideShow $infoScreenSlideShow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoScreenSlideShow  $infoScreenSlideShow
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoScreenSlideShow $infoScreenSlideShow)
    {
        //
    }
}

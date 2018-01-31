<?php

namespace App\Http\Controllers;

use App\Screen;
use App\SlideShow;
use Illuminate\Http\Request;

/**
 * Class SlideShowController
 * @package App\Http\Controllers
 */
class SlideShowController extends Controller
{
    /**
     * SlideShowController constructor.
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
    public function index(Screen $screen)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Screen $screen
     * @return \Illuminate\Http\Response
     */
    public function create(Screen $screen)
    {
        return view('layouts.slideshow.create', compact('screen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Screen $screen)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $slideshow = $screen->slideShows()->create($request->only(['name']));
        if (!$screen->activeSlideShow()->exists()) {
            $screen->activeSlideShow()->associate($slideshow)->save();
        }
        return redirect()->route('slideshow.show', ['slideshow' => $slideshow, 'url' => $screen]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SlideShow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function show(Screen $screen, SlideShow $slideshow)
    {
        $slides = $slideshow->slides()->get();
        return view('layouts.slideshow.show', compact(['screen', 'slideshow', 'slides']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SlideShow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function edit(SlideShow $slideshow)
    {
        return view('layouts.slideshows.edit', compact('slideshow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SlideShow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlideShow $slideshow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlideShow  $slideshow
     * @return \Illuminate\Http\Response
     *
     * TODO: Prevent deleting active slideshow?
     */
    public function destroy(Screen $screen, SlideShow $slideshow)
    {
        if ($screen->activeSlideShow == $slideshow) {
            $screen->activeSlideShow()->dissociate()->save();
        }
        $slideshow->delete();
        return redirect()->route('screen.edit', ['screen' => $screen]);
    }
}

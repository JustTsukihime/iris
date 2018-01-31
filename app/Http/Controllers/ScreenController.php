<?php

namespace App\Http\Controllers;

use App\Screen;
use App\Slide;
use App\SlideShow;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    /**
     * ScreenController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'slides']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.screen.index', ['screens' => Screen::all()]);
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
     *
     * TODO: Create default slideshow for new screen
     * TODO: Restrain URL to be unique
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required|unique:screens,url',
        ]);

        $is = Screen::create(request(['name', 'url']));
        return redirect()->route('screen.edit', $is->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function show(Screen $screen)
    {
        return view('layouts.screen.show', compact('screen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function edit(Screen $screen)
    {
        $slideshows = $screen->slideShows()->get();
        return view('layouts.screen.edit', compact(['screen', 'slideshows']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screen $screen)
    {
        $this->validate($request, [
            'name' => 'required',
            'active_slide_show' => 'required|exists:slide_shows,id',
        ]);

        $screen->update($request->only(['name', 'active_slide_show']));
        return back();
    }

    /**
     * @param Screen $screen
     * @return array
     *
     */
    public function slides(Screen $screen) {
        $slides = $screen->activeSlideShow()
            ->get(['id', 'name', 'url']);

        return ['Pages' => $slides];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Screen  $screen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screen $screen)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Screen;
use App\Slide;
use App\SlideShow;
use Illuminate\Http\Request;

class SlideController extends Controller
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
    public function store(Request $request, Screen $screen)
    {
        $this->validate($request, [
            'name' => 'required',
            'slide_show' => 'required|exists:slide_shows,id',
            'content' => 'required|image|max:2000'
        ]);

        $path = $request->file('content')->storePublicly('slides', 'public');

        $slide = $screen->slides()->create(array_merge($request->only(['name']), ['url' => $path]));
        SlideShow::findOrFail($request->slide_show)->slides()->attach($slide);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     *
     * TODO: Dissociate slide instead of deleting it.
     */
    public function destroy(Screen $screen, Slide $slide)
    {
        $slide->delete();
        return back();
    }
}

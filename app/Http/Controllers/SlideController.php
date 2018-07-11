<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use LaravelLocalization;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return view('manage.slides.index')->withSlides($slides);
    }

    public function fetch()
    {
        $slides = Slide::all();
        return $slides;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.slides.create');
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
            'fields.*.content' => 'required',
            'fields.*.title' => 'required',
        ]);

        $slide = new Slide();
        $slide->enabled = true;
        $slide->save(); 

        foreach ($request->fields as $field) {
            $slide->translateOrNew($field['locale'])->title = $field['title'];
            $slide->translateOrNew($field['locale'])->content = $field['content'];
        }

        if($slide->save()){
            return [
                'redirectTo' => 'slides.index',
                'message' => 'slide has been saved',
            ];
        }else{
            return $redirectTo = 'slides.create';
        }
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
        $slide = Slide::findOrFail($slide['id']);
        $slide->enabled = $request->slide['enabled'];
        $slide->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Slide $slide)
    {
        $slide = Slide::findOrFail($slide['id']);
        $slide->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class WelcomeController extends Controller
{
    public function index()
    {
        $slides = Slide::all()->where('enabled', true);
        return view('welcome')->withSlides($slides);
    }
}

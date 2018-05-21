<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }
}

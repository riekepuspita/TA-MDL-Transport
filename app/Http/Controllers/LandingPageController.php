<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function homeIndex()
    {
        return view('mdltransport', [
            "title" => "MDL Transport"
        ]);
    }

    public function aboutIndex()
    {
        return view('about', [
            "title" => "About"
        ]);
    }

    public function mobilIndex()
    {
        return view('mobil', [
            "title" => "Mobil"
        ]);
    }

    public function contactIndex()
    {
        return view('contact', [
            "title" => "Contact"
        ]);
    }

    
}

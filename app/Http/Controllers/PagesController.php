<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('staticpages.index', ['title' => 'Welcome to Samedaylivery']);
    }

    public function how_it_works()
    {
        return view('staticpages.howitworks', ['title' => 'How It Works - Samedaylivery']);
    }

    public  function benefits()
    {
        return view('staticpages.benefits', ['title' => 'Benefits - Samedaylivery']);
    }

    public  function about()
    {
        return view('staticpages.about', ['title' => 'About Us - Samedaylivery']);
    }

    public  function pricing()
    {
        return view('staticpages.pricing', ['title' => 'Pricing - Samedaylivery']);
    }

    public function terms()
    {
        return view('staticpages.terms', ['title' => 'Terms & Conditions - Samedaylivery']);
    }
}

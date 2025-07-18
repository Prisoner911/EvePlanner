<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ratings;

class EveController extends Controller
{
    public function home()
    {
        $ratings = Ratings::orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('ratings'))->with('title', "Eve-Planner");
    }

    public function privateEvent()
    {
        return view('PrivateEvent')->with('title', "Private Event");
    }

    public function weddingEvent()
    {
        return view('WeddingEvent')->with('title', "Wedding Event");
    }

    public function corporateEvent()
    {
        return view('CorporateEvent')->with('title', "Corporate Event");
    }

    public function bookEvent()
    {
        return view('bookingpage')->with('title', "Book Event");
    }


    public function aboutUs()
    {
        return view('aboutPage')->with('title', "About Us");
    }
}

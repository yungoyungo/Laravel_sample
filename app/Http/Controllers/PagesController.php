<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        $data = [];
        $data["first_name"] = "Luke";
        $data["last_name"] = "Skywalker";

        // view関数に配列を渡す
        return view('pages.about', $data);

        //return view('pages.about');
    }

    public function contact()
    {
        return view('contact');
    }
}

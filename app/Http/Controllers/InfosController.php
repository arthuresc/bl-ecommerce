<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfosController extends Controller
{
    public function about() {
        return view('infos.about');
    }

    public function contact() {
        return view('infos.contact');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home',[
            'bands' => Band::with('album')->latest()->paginate(10),
        ]);
    }
}

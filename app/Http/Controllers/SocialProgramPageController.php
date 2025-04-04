<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SocialProgramPageController extends Controller
{
    public function index():View{
        return view('socialpage');
    }
}

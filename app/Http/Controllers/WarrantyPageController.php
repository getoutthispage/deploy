<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class WarrantyPageController extends Controller
{
    public function index():View
    {
        return view('warranty');
    }
}

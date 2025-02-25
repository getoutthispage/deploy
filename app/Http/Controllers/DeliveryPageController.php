<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DeliveryPageController extends Controller
{
    public function index(): View
    {
        return view('delivery');
    }
}

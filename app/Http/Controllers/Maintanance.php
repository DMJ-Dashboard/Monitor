<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Maintanance extends Controller
{
    public function maintanance(Request $request)
    {
        return view('maintanance.servicese');
    }
}

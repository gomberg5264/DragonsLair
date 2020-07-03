<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miscController extends Controller
{
    public function back()
    {
        return redirect()->back();
    }
}

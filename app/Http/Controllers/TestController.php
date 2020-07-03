<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Test;

class TestController extends Controller
{
    public function Foo()
    {
        return view('misc.foo');
    }
}

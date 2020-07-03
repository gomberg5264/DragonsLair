<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FailController extends Controller
{
    public function index($errorCode = '')
    {
        return view('misc.fail')->with('errorCode', $errorCode);
    }
    public function unauthenticated()
    {
        return $this->index('unauthenticated');
    }
    public function incorrectCredentials()
    {
        return $this->index('incorrectCredentials');
    }
    public function wrongPermissions()
    {
        return $this->index('wrongPermissions');
    }
}

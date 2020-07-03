<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function index($successCode = '')
    {
        return view('misc.success')->with('successCode', $successCode);
    }
    public function postCreateSuccess()
    {
        return $this->index('postCreateSuccess');
    }
    public function registrationSuccess()
    {
        return $this->index('registrationSuccess');
    }
    public function postDeleteSuccess()
    {
        return $this->index('postDeleteSuccess');
    }
    public function postEditSuccess()
    {
        return $this->index('postEditSuccess');
    }
    public function logoutSuccess()
    {
        return $this->index('logoutSuccess');
    }
    public function loginSuccess()
    {
        return $this->index('loginSuccess');
    }
}

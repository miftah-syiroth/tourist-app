<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecreationController extends Controller
{
    public function index()
    {
        return view('recreation.index');
    }

    public function create()
    {
        return view('recreation.create');
    }
}

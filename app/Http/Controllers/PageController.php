<?php

namespace App\Http\Controllers;

use App\Models\Recreation;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $recreations = Recreation::where('status', true)->get();
        dd($recreations);
        die;
        return view('frontpage.index', [
            'recreation' => $recreations,
        ]);
    }

    public function recreation()
    {
        return view('frontpage.recreation');
    }

    public function event()
    {
        return view('frontpage.event');
    }

    public function facility()
    {
        return view('frontpage.facility');
    }
}

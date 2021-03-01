<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Headline;
use App\Models\HeroImage;
use App\Models\Recreation;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $recreations = Recreation::with('images')->where('status', true)->orderBy('updated_at', 'asc')->take(3)->get();
        $events = Event::with('recreation')->where([
            ['status', true],
            ['finish_date', '>', Carbon::now()]
        ])->orderBy('start_date', 'asc')->take(6)->get();
        $heroImage = HeroImage::where('status', true)->orderBy('updated_at', 'desc')->first();
        $headline = Headline::find(1);

        return view('frontpage.index', [
            'recreations' => $recreations,
            'events' => $events,
            'heroImage' => $heroImage,
            'headline' => $headline,
        ]);
    }

    public function recreation()
    {
        $recreations = Recreation::with('images')->where('status', true)->get();

        return view('frontpage.recreation', [
            'recreations' => $recreations,
        ]);
    }

    public function event()
    {
        $events = Event::with('recreation')->where([
            ['status', true],
            ['finish_date', '>', Carbon::now()]
        ])->get();

        return view('frontpage.event', [
            'events' => $events,
        ]);
    }

    public function facility()
    {
        return view('frontpage.facility');
    }
}

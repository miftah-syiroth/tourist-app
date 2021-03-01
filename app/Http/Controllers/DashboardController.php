<?php

namespace App\Http\Controllers;

use App\Models\Headline;
use App\Models\HeroImage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function componentView()
    {
        $heroImage = HeroImage::where('status', true)->orderBy('updated_at', 'desc')->first();
        $headline = Headline::find(1);

        return view('dashboard.component', [
            'heroImage' => $heroImage,
            'headline' => $headline,
        ]);
    }
}

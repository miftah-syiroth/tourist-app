<?php

namespace App\Http\Controllers;

use App\Models\Headline;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    public function update(Request $request, Headline $headline)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        $headline->update($attributes);

        return redirect()->back();
    }
}

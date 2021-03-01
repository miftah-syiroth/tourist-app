<?php

namespace App\Http\Controllers;

use App\Models\HeroImage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class HeroImageController extends Controller
{
    public function index()
    {
        $images = HeroImage::all();
        $imageSelected = HeroImage::where('status', false)->orderBy('updated_at', 'asc')->first();

        return view('hero-image.index', [
            'images' => $images,
            'imageSelected' => $imageSelected,
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'image' => 'image|required',
        ]);
        $attributes['status'] = false;
        $attributes['image'] = $attributes['image']->store('images/hero-image');

        HeroImage::create($attributes);

        return redirect()->back();
    }

    public function destroy(HeroImage $heroImage)
    {
        Storage::delete($heroImage->image);
        $heroImage->delete();

        return redirect()->back();
    }

    public function setStatus(HeroImage $heroImage)
    {
        $heroImage->update([
            'status' => $heroImage->status == true ? false : true,
        ]);

        return redirect()->back();
    }
}

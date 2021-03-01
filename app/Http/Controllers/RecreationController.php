<?php

namespace App\Http\Controllers;

use App\Models\Recreation;
use App\Models\RecreationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecreationController extends Controller
{
    public function index()
    {
        $recreations = Recreation::orderByDesc('created_at')->get();

        return view('recreation.index', [
            'recreations' => $recreations,
        ]);
    }

    public function create()
    {
        return view('recreation.create');
    }

    public function store(Request $request)
    {
        /**validasi dulu dan masukkan ke dalam array, array akan dipakai untuk mass assignment */
        $attributes = $request->validate([
            'name' => 'required',
            'start_day' => 'required',
            'finish_day' => 'required',
            'price' => 'required',
            'quote' => 'required',
            'images.0' => 'required|image',
            'images.1' => 'required|image',
            'images.2' => 'required|image',
        ]);

        /**rekreasi memiliki kolom slug dan status, sedangkan field input tidak ada. jd buat dulu */
        $attributes['slug'] = Str::of($attributes['name'])->slug('-');
        $attributes['status'] = false;

        /**simpan array atribut, model rekreasi akan menyesuaikan fillable */
        $recreation = Recreation::create($attributes);

        /**simpan file gambar */
        foreach ($attributes['images'] as $key => $image) {
            $recreation->images()->create([
                'image' => $image->store('images/recreation'),
            ]);
        }

        return redirect('/dashboard/recreations');
    }

    public function edit(Recreation $recreation)
    {
        return view('recreation.edit', [
            'recreation' => $recreation,
        ]);
    }

    public function update(Request $request, Recreation $recreation)
    {
        /** validasi dulu, tp sayang masih ada error di sini khususnya images */
        $attributes = $request->validate([
            'name' => 'required',
            'start_day' => 'required',
            'finish_day' => 'required',
            'price' => 'required',
            'quote' => 'required',
            'images' => '',
        ]);

        /**update rekreasi berdasarkan field input. model rekreasi akan menyesuaikan fillable */
        $recreation->update($attributes);

        /**cek ada input gambar atau tidak */
        if (Arr::exists($attributes, 'images')) {
            foreach ($attributes['images'] as $key => $image) {
                $row = RecreationImage::find($key);

                /**hapus dulu yang ada di storage */
                Storage::delete($row->image);

                /**simpan yang baru */
                $row->update([
                    'image' => $image->store('images/recreation'),
                ]);
            }
        }
        return redirect('/dashboard/recreations');
    }

    public function destroy(Recreation $recreation)
    {
        $images = $recreation->images;

        foreach ($images as $key => $image) {
            Storage::delete($image->image);
        }

        $recreation->delete();

        return redirect()->back();
    }

    public function setStatus(Recreation $recreation)
    {
        $recreation->update([
            'status' => $recreation->status == true ? false : true,
        ]);

        return redirect()->back();
    }
}

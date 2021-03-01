<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Recreation;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('recreation')->get();
        return view('event.index', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        $recreations = Recreation::all();

        return view('event.create', [
            'recreations' => $recreations,
        ]);
    }

    public function store(EventRequest $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $attributes = $request->all();

        /**gantai image dengan pathnya sendiri setelah proses store */
        $attributes['image'] = $attributes['image']->store('images/event');
        $attributes['slug'] = Str::of($attributes['name'])->slug('-');

        /**simpan event menggunakan relasi */
        Recreation::find($attributes['recreation'])->events()->create($attributes);

        return redirect('/dashboard/events');
    }

    public function edit(Event $event)
    {
        $recreations = Recreation::all();
        return view('event.edit', [
            'event' => $event,
            'recreations' => $recreations,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        /**ubah collection menjadi array */
        $attributes = $request->all();

        /**cek apakah ada input gambar baru */
        if (Arr::exists($attributes, 'image')) {
            Storage::delete($event->image); //hapus dulu gambar terdahulu

            $attributes['image'] = $attributes['image']->store('images/event');
        }

        $event->update($attributes);

        return redirect('/dashboard/events');
    }

    public function destroy(Event $event)
    {
        Storage::delete($event->image);
        $event->delete();
        return redirect()->back();
    }

    public function setStatus(Event $event)
    {
        $event->update([
            'status' => $event->status == true ? false : true,
        ]);

        return redirect()->back();
    }
}

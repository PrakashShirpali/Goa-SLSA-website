<?php

namespace App\Http\Controllers;

use App\Models\GalleryEvent;
use Illuminate\Http\Request;

class GalleryEventController extends Controller
{
    public function index()
    {
        $GslsaEvents = GalleryEvent::withoutTrashed()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('gslsa.gallery.events.gslsaevents', compact('GslsaEvents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_title' => 'nullable',
            'event_description' => 'nullable',
            'slug' => 'required',
            'event_date' => 'nullable|date',
            'thumbnail_path' => 'nullable',
        ]);

        GalleryEvent::create($data);

        return redirect(route('GslsaEvents.index'));
    }

    public function edit(GalleryEvent $GslsaEvent)
    {
        return view('gslsa.gallery.events.gslsaeventsedit', compact('GslsaEvent'));
    }

    public function update(Request $request, GalleryEvent $GslsaEvent)
    {

        $data = $request->validate([
            'event_title' => 'nullable',
            'event_description' => 'nullable',
            'slug' => 'required',
            'event_date' => 'nullable|date',
            'thumbnail_path' => 'nullable',
        ]);

        $GslsaEvent->update($data);

        return redirect(route('GslsaEvents.index'));
    }

    public function destroy(GalleryEvent $GslsaEvent)
    {
        $GslsaEvent->delete();

        return redirect(route('GslsaEvents.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\GalleryEvent;
use App\Models\HomeNotices;
use App\Models\HomeYoutubeVideos;

class HomeController extends Controller
{
    public function homePage()
    {
        $youtubelinks = HomeYoutubeVideos::withoutTrashed()
            ->get();
        $homenotices = HomeNotices::withoutTrashed()
            ->orderBy('created_at', 'desc')
            ->get();

        // Fetch all events dynamically (from the English schema by default)
        $events = GalleryEvent::latest()->get(); // Or use any logic for multilingual events

        return view('gslsa.HOME.home', compact('youtubelinks', 'homenotices', 'events'));
    }
}

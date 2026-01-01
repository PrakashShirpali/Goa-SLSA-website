<?php

namespace App\Http\Controllers;

use App\Models\GalleryEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    // Display all events in the gallery
    public function galleryPage()
    {
        // Fetch all events dynamically (from the English schema by default)
        $events = GalleryEvent::latest()->get(); // Or use any logic for multilingual events

        // Pass the events to the gallery view
        return view('gslsa.GALLERY.gallery', compact('events'));
    }

    public function eventPage($slug)
    {
        // Fetch the event based on slug
        $event = GalleryEvent::where('slug', $slug)->first();

        if (!$event) {
            abort(404); // Show 404 error if event is not found
        }

        // Define the event folder paths
        $eventFolderPath = public_path("events/{$slug}");
        $photosPath = $eventFolderPath . '/photos';
        $videoFilePath = $eventFolderPath . '/videos.txt'; // Path for YouTube links file

        // Ensure the event folder exists
        if (!File::exists($eventFolderPath)) {
            File::makeDirectory($eventFolderPath, 0777, true, true);
        }

        // Ensure the photos folder exists
        if (!File::exists($photosPath)) {
            File::makeDirectory($photosPath, 0777, true);
        }

        // Ensure videos.txt exists
        if (!File::exists($videoFilePath)) {
            File::put($videoFilePath, ""); // Create an empty file
        }

        // Fetch photos from the folder
        $photos = glob($photosPath . '/*');

        // Fetch video links from `videos.txt`
        $videos = array_filter(explode("\n", File::get($videoFilePath))); // Read links as an array

        // Return event details with photos and YouTube video links
        return view('gslsa.GALLERY.show', compact('event', 'photos', 'videos'));
    }
}

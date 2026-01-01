<?php

namespace App\Http\Controllers;

use App\Models\HomeYoutubeVideos;
use Illuminate\Http\Request;

class HomeYoutubeVideosController extends Controller
{
    public function index()
    {
        $GslsaYoutubeVideos = HomeYoutubeVideos::withoutTrashed()
            ->get();

        return view('gslsa.home.gslsayoutubevideos', compact('GslsaYoutubeVideos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        HomeYoutubeVideos::create($data);

        return redirect(route('GslsaYoutubeVideos.index'));
    }

    public function edit(HomeYoutubeVideos $GslsaYoutubeVideo)
    {

        return view('gslsa.home.gslsayoutubevideosedit', compact('GslsaYoutubeVideo'));
    }

    public function update(Request $request, HomeYoutubeVideos $GslsaYoutubeVideo)
    {
        $data = $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

        $GslsaYoutubeVideo->update($data);

        return redirect(route('GslsaYoutubeVideos.index'));
    }

    public function destroy(HomeYoutubeVideos $GslsaYoutubeVideo)
    {
        $GslsaYoutubeVideo->delete();

        return redirect(route('GslsaYoutubeVideos.index'));
    }
}

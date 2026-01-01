<?php

namespace App\Http\Controllers;

use App\Models\HomeNotices;
use Illuminate\Http\Request;

class HomeNoticesController extends Controller
{

    public function index()
    {
        $GslsaNotices = HomeNotices::withoutTrashed()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('gslsa.home.gslsanotices', compact('GslsaNotices'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'notice' => 'required',
            'path' => 'nullable',
        ]);

        HomeNotices::create($data);

        return redirect(route('GslsaNotices.index'));
    }

    public function edit(HomeNotices $GslsaNotice)
    {
        return view('gslsa.home.gslsanoticesedit', compact('GslsaNotice'));
    }

    public function update(Request $request, HomeNotices $GslsaNotice)
    {

        $data = $request->validate([
            'notice' => 'required',
            'path' => 'nullable',
        ]);

        $GslsaNotice->update($data);

        return redirect(route('GslsaNotices.index'));
    }

    public function destroy(HomeNotices $GslsaNotice)
    {
        $GslsaNotice->delete();

        return redirect(route('GslsaNotices.index'));
    }
}

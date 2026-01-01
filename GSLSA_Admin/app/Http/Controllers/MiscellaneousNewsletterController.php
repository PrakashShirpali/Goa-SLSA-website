<?php

namespace App\Http\Controllers;

use App\Models\MiscellaneousNewsletter;
use Illuminate\Http\Request;

class MiscellaneousNewsletterController extends Controller
{
    public function index()
    {
        $GslsaNewsletters = MiscellaneousNewsletter::withoutTrashed()->orderBy('created_at', 'desc')->get();

        return view('gslsa.miscellaneous.gslsanewsletters', compact('GslsaNewsletters'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'newsletter_notice' => 'required',
            'path' => 'nullable',
        ]);

        MiscellaneousNewsletter::create($data);

        return redirect(route('GslsaNewsletters.index'));
    }

    public function edit(MiscellaneousNewsletter $GslsaNewsletter)
    {
       return view('gslsa.miscellaneous.gslsanewslettersedit', compact('GslsaNewsletter'));
    }

    public function update(Request $request, MiscellaneousNewsletter $GslsaNewsletter)
    {
        $data = $request->validate([
            'newsletter_notice' => 'required',
            'path' => 'nullable',
        ]);

        $GslsaNewsletter->update($data);

        return redirect(route('GslsaNewsletters.index'));
    }

    public function destroy(MiscellaneousNewsletter $GslsaNewsletter)
    {
        $GslsaNewsletter->delete();

        return redirect(route('GslsaNewsletters.index'));
    }
}

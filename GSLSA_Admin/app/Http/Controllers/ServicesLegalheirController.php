<?php

namespace App\Http\Controllers;

use App\Models\ServicesLegalheir;
use Illuminate\Http\Request;

class ServicesLegalheirController extends Controller
{
    public function index()
    {
        $GslsaLegalheirs = ServicesLegalheir::withoutTrashed()->get();

        return view('gslsa.services.gslsalegalheir', compact('GslsaLegalheirs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'contact_no' => 'required',
            'path' => 'nullable',
        ]);

        ServicesLegalheir::create($data);

        return redirect(route('GslsaLegalheirs.index'));
    }

    public function edit(ServicesLegalheir $GslsaLegalheir)
    {
       return view('gslsa.services.gslsalegalheiredit', compact('GslsaLegalheir'));
    }

    public function update(Request $request, ServicesLegalheir $GslsaLegalheir)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'contact_no' => 'required',
            'path' => 'nullable',
        ]);

        $GslsaLegalheir->update($data);

        return redirect(route('GslsaLegalheirs.index'));
    }

    public function destroy(ServicesLegalheir $GslsaLegalheir)
    {
        $GslsaLegalheir->delete();

        return redirect(route('GslsaLegalheirs.index'));
    }
}

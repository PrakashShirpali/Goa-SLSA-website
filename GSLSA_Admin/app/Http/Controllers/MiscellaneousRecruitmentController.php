<?php

namespace App\Http\Controllers;

use App\Models\MiscellaneousRecruitment;
use Illuminate\Http\Request;

class MiscellaneousRecruitmentController extends Controller
{
    public function index()
    {
        $GslsaRecruitments = MiscellaneousRecruitment::withoutTrashed()->orderBy('created_at', 'desc')->get();

        return view('gslsa.miscellaneous.gslsarecruitment', compact('GslsaRecruitments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'recruitment_notice' => 'required',
            'path' => 'nullable',
        ]);

        MiscellaneousRecruitment::create($data);

        return redirect(route('GslsaRecruitments.index'));
    }

    public function edit(MiscellaneousRecruitment $GslsaRecruitment)
    {
       return view('gslsa.miscellaneous.gslsarecruitmentedit', compact('GslsaRecruitment'));
    }

    public function update(Request $request, MiscellaneousRecruitment $GslsaRecruitment)
    {
        $data = $request->validate([
            'recruitment_notice' => 'required',
            'path' => 'nullable',
        ]);

        $GslsaRecruitment->update($data);

        return redirect(route('GslsaRecruitments.index'));
    }

    public function destroy(MiscellaneousRecruitment $GslsaRecruitment)
    {
        $GslsaRecruitment->delete();

        return redirect(route('GslsaRecruitments.index'));
    }
}

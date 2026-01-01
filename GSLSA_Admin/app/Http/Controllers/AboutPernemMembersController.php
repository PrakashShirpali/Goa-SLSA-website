<?php

namespace App\Http\Controllers;

use App\Models\AboutPernemMembers;
use Illuminate\Http\Request;

class AboutPernemMembersController extends Controller
{
    public function index()
    {
        $GslsaPernemMembers = AboutPernemMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsapernemmembers', compact('GslsaPernemMembers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'role' => 'required',
            'title' => 'nullable',
            'name' => 'required',
            'post' => 'nullable',
            'image_path' => 'nullable',
            'role_order' => 'nullable',
            'priority' => 'nullable',
        ]);

        AboutPernemMembers::create($data);

        return redirect(route('GslsaPernemMembers.index'));
    }

    public function edit(AboutPernemMembers $GslsaPernemMember)
    {
        return view('gslsa.about.taluka.gslsapernemmembersedit', compact('GslsaPernemMember'));
    }

    public function update(Request $request, AboutPernemMembers $GslsaPernemMember)
    {
        $data = $request->validate([
            'role' => 'required',
            'title' => 'nullable',
            'name' => 'required',
            'post' => 'nullable',
            'image_path' => 'nullable',
            'role_order' => 'nullable',
            'priority' => 'nullable',
        ]);

        $GslsaPernemMember->update($data);

        return redirect(route('GslsaPernemMembers.index'));
    }

    public function destroy(AboutPernemMembers $GslsaPernemMember)
    {
        $GslsaPernemMember->delete();

        return redirect(route('GslsaPernemMembers.index'));
    }
}

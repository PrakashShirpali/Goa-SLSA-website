<?php

namespace App\Http\Controllers;

use App\Models\AboutSattariMembers;
use Illuminate\Http\Request;

class AboutSattariMembersController extends Controller
{
    public function index()
    {
        $GslsaSattariMembers = AboutSattariMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsasattarimembers', compact('GslsaSattariMembers'));
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

        AboutSattariMembers::create($data);

        return redirect(route('GslsaSattariMembers.index'));
    }

    public function edit(AboutSattariMembers $GslsaSattariMember)
    {
        return view('gslsa.about.taluka.gslsasattarimembersedit', compact('GslsaSattariMember'));
    }

    public function update(Request $request, AboutSattariMembers $GslsaSattariMember)
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

        $GslsaSattariMember->update($data);

        return redirect(route('GslsaSattariMembers.index'));
    }

    public function destroy(AboutSattariMembers $GslsaSattariMember)
    {
        $GslsaSattariMember->delete();

        return redirect(route('GslsaSattariMembers.index'));
    }
}

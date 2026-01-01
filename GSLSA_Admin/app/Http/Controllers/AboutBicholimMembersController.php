<?php

namespace App\Http\Controllers;

use App\Models\AboutBicholimMembers;
use Illuminate\Http\Request;

class AboutBicholimMembersController extends Controller
{
    public function index()
    {
        $GslsaBicholimMembers = AboutBicholimMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsabicholimmembers', compact('GslsaBicholimMembers'));
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

        AboutBicholimMembers::create($data);

        return redirect(route('GslsaBicholimMembers.index'));
    }

    public function edit(AboutBicholimMembers $GslsaBicholimMember)
    {
        return view('gslsa.about.taluka.gslsabicholimmembersedit', compact('GslsaBicholimMember'));
    }

    public function update(Request $request, AboutBicholimMembers $GslsaBicholimMember)
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

        $GslsaBicholimMember->update($data);

        return redirect(route('GslsaBicholimMembers.index'));
    }

    public function destroy(AboutBicholimMembers $GslsaBicholimMember)
    {
        $GslsaBicholimMember->delete();

        return redirect(route('GslsaBicholimMembers.index'));
    }
}

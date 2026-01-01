<?php

namespace App\Http\Controllers;

use App\Models\AboutSouthMembers;
use Illuminate\Http\Request;

class AboutSouthMembersController extends Controller
{
    public function index()
    {
        $GslsaSouthMembers = AboutSouthMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.district.gslsasouthmembers', compact('GslsaSouthMembers'));
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

        AboutSouthMembers::create($data);

        return redirect(route('GslsaSouthMembers.index'));
    }

    public function edit(AboutSouthMembers $GslsaSouthMember)
    {
        return view('gslsa.about.district.gslsasouthmembersedit', compact('GslsaSouthMember'));
    }

    public function update(Request $request, AboutSouthMembers $GslsaSouthMember)
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

        $GslsaSouthMember->update($data);

        return redirect(route('GslsaSouthMembers.index'));
    }

    public function destroy(AboutSouthMembers $GslsaSouthMember)
    {
        $GslsaSouthMember->delete();

        return redirect(route('GslsaSouthMembers.index'));
    }
}

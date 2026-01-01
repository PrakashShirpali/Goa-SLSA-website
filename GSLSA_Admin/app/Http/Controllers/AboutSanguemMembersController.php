<?php

namespace App\Http\Controllers;

use App\Models\AboutSanguemMembers;
use Illuminate\Http\Request;

class AboutSanguemMembersController extends Controller
{
    public function index()
    {
        $GslsaSanguemMembers = AboutSanguemMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsasanguemmembers', compact('GslsaSanguemMembers'));
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

        AboutSanguemMembers::create($data);

        return redirect(route('GslsaSanguemMembers.index'));
    }

    public function edit(AboutSanguemMembers $GslsaSanguemMember)
    {
        return view('gslsa.about.taluka.gslsasanguemmembersedit', compact('GslsaSanguemMember'));
    }

    public function update(Request $request, AboutSanguemMembers $GslsaSanguemMember)
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

        $GslsaSanguemMember->update($data);

        return redirect(route('GslsaSanguemMembers.index'));
    }

    public function destroy(AboutSanguemMembers $GslsaSanguemMember)
    {
        $GslsaSanguemMember->delete();

        return redirect(route('GslsaSanguemMembers.index'));
    }
}

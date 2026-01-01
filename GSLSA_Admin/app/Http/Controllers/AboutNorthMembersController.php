<?php

namespace App\Http\Controllers;

use App\Models\AboutNorthMembers;
use Illuminate\Http\Request;

class AboutNorthMembersController extends Controller
{
    public function index()
    {
        $GslsaNorthMembers = AboutNorthMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.district.gslsanorthmembers', compact('GslsaNorthMembers'));
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

        AboutNorthMembers::create($data);

        return redirect(route('GslsaNorthMembers.index'));
    }

    public function edit(AboutNorthMembers $GslsaNorthMember)
    {
        return view('gslsa.about.district.gslsanorthmembersedit', compact('GslsaNorthMember'));
    }

    public function update(Request $request, AboutNorthMembers $GslsaNorthMember)
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

        $GslsaNorthMember->update($data);

        return redirect(route('GslsaNorthMembers.index'));
    }

    public function destroy(AboutNorthMembers $GslsaNorthMember)
    {
        $GslsaNorthMember->delete();

        return redirect(route('GslsaNorthMembers.index'));
    }
}

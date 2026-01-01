<?php

namespace App\Http\Controllers;

use App\Models\AboutTiswadiMembers;
use Illuminate\Http\Request;

class AboutTiswadiMembersController extends Controller
{
    public function index()
    {
        $GslsaTiswadiMembers = AboutTiswadiMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsatiswadimembers', compact('GslsaTiswadiMembers'));
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

        AboutTiswadiMembers::create($data);

        return redirect(route('GslsaTiswadiMembers.index'));
    }

    public function edit(AboutTiswadiMembers $GslsaTiswadiMember)
    {
        return view('gslsa.about.taluka.gslsatiswadimembersedit', compact('GslsaTiswadiMember'));
    }

    public function update(Request $request, AboutTiswadiMembers $GslsaTiswadiMember)
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

        $GslsaTiswadiMember->update($data);

        return redirect(route('GslsaTiswadiMembers.index'));
    }

    public function destroy(AboutTiswadiMembers $GslsaTiswadiMember)
    {
        $GslsaTiswadiMember->delete();

        return redirect(route('GslsaTiswadiMembers.index'));
    }
}

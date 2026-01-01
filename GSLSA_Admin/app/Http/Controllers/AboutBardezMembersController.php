<?php

namespace App\Http\Controllers;

use App\Models\AboutBardezMembers;
use Illuminate\Http\Request;

class AboutBardezMembersController extends Controller
{
    public function index()
    {
        $GslsaBardezMembers = AboutBardezMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsabardezmembers', compact('GslsaBardezMembers'));
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

        AboutBardezMembers::create($data);

        return redirect(route('GslsaBardezMembers.index'));
    }

    public function edit(AboutBardezMembers $GslsaBardezMember)
    {
        return view('gslsa.about.taluka.gslsabardezmembersedit', compact('GslsaBardezMember'));
    }

    public function update(Request $request, AboutBardezMembers $GslsaBardezMember)
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

        $GslsaBardezMember->update($data);

        return redirect(route('GslsaBardezMembers.index'));
    }

    public function destroy(AboutBardezMembers $GslsaBardezMember)
    {
        $GslsaBardezMember->delete();

        return redirect(route('GslsaBardezMembers.index'));
    }
}

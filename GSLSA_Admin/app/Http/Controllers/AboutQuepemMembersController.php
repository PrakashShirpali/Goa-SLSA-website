<?php

namespace App\Http\Controllers;

use App\Models\AboutQuepemMembers;
use Illuminate\Http\Request;

class AboutQuepemMembersController extends Controller
{
    public function index()
    {
        $GslsaQuepemMembers = AboutQuepemMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsaquepemmembers', compact('GslsaQuepemMembers'));
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

        AboutQuepemMembers::create($data);

        return redirect(route('GslsaQuepemMembers.index'));
    }

    public function edit(AboutQuepemMembers $GslsaQuepemMember)
    {
        return view('gslsa.about.taluka.gslsaquepemmembersedit', compact('GslsaQuepemMember'));
    }

    public function update(Request $request, AboutQuepemMembers $GslsaQuepemMember)
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

        $GslsaQuepemMember->update($data);

        return redirect(route('GslsaQuepemMembers.index'));
    }

    public function destroy(AboutQuepemMembers $GslsaQuepemMember)
    {
        $GslsaQuepemMember->delete();

        return redirect(route('GslsaQuepemMembers.index'));
    }
}

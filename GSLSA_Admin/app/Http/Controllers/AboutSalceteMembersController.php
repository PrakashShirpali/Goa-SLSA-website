<?php

namespace App\Http\Controllers;

use App\Models\AboutSalceteMembers;
use Illuminate\Http\Request;

class AboutSalceteMembersController extends Controller
{
    public function index()
    {
        $GslsaSalceteMembers = AboutSalceteMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsasalcetemembers', compact('GslsaSalceteMembers'));
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

        AboutSalceteMembers::create($data);

        return redirect(route('GslsaSalceteMembers.index'));
    }

    public function edit(AboutSalceteMembers $GslsaSalceteMember)
    {
        return view('gslsa.about.taluka.gslsasalcetemembersedit', compact('GslsaSalceteMember'));
    }

    public function update(Request $request, AboutSalceteMembers $GslsaSalceteMember)
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

        $GslsaSalceteMember->update($data);

        return redirect(route('GslsaSalceteMembers.index'));
    }

    public function destroy(AboutSalceteMembers $GslsaSalceteMember)
    {
        $GslsaSalceteMember->delete();

        return redirect(route('GslsaSalceteMembers.index'));
    }
}

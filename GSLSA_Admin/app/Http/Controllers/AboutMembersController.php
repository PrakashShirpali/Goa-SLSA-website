<?php

namespace App\Http\Controllers;

use App\Models\AboutMembers;
use Illuminate\Http\Request;

class AboutMembersController extends Controller
{
    public function index()
    {
        $GslsaMembers = AboutMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.gslsamembers', compact('GslsaMembers'));
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

        AboutMembers::create($data);

        return redirect(route('GslsaMembers.index'));
    }

    public function edit(AboutMembers $GslsaMember)
    {
        return view('gslsa.about.gslsamembersedit', compact('GslsaMember'));
    }

    public function update(Request $request, AboutMembers $GslsaMember)
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

        $GslsaMember->update($data);

        return redirect(route('GslsaMembers.index'));
    }

    public function destroy(AboutMembers $GslsaMember)
    {
        $GslsaMember->delete();

        return redirect(route('GslsaMembers.index'));
    }
}

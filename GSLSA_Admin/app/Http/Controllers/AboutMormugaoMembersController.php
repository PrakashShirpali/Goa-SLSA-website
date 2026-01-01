<?php

namespace App\Http\Controllers;

use App\Models\AboutMormugaoMembers;
use Illuminate\Http\Request;

class AboutMormugaoMembersController extends Controller
{
    public function index()
    {
        $GslsaMormugaoMembers = AboutMormugaoMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsamormugaomembers', compact('GslsaMormugaoMembers'));
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

        AboutMormugaoMembers::create($data);

        return redirect(route('GslsaMormugaoMembers.index'));
    }

    public function edit(AboutMormugaoMembers $GslsaMormugaoMember)
    {
        return view('gslsa.about.taluka.gslsamormugaomembersedit', compact('GslsaMormugaoMember'));
    }

    public function update(Request $request, AboutMormugaoMembers $GslsaMormugaoMember)
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

        $GslsaMormugaoMember->update($data);

        return redirect(route('GslsaMormugaoMembers.index'));
    }

    public function destroy(AboutMormugaoMembers $GslsaMormugaoMember)
    {
        $GslsaMormugaoMember->delete();

        return redirect(route('GslsaMormugaoMembers.index'));
    }
}

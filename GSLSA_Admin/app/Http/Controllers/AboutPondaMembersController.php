<?php

namespace App\Http\Controllers;

use App\Models\AboutPondaMembers;
use Illuminate\Http\Request;

class AboutPondaMembersController extends Controller
{
    public function index()
    {
        $GslsaPondaMembers = AboutPondaMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsapondamembers', compact('GslsaPondaMembers'));
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

        AboutPondaMembers::create($data);

        return redirect(route('GslsaPondaMembers.index'));
    }

    public function edit(AboutPondaMembers $GslsaPondaMember)
    {
        return view('gslsa.about.taluka.gslsapondamembersedit', compact('GslsaPondaMember'));
    }

    public function update(Request $request, AboutPondaMembers $GslsaPondaMember)
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

        $GslsaPondaMember->update($data);

        return redirect(route('GslsaPondaMembers.index'));
    }

    public function destroy(AboutPondaMembers $GslsaPondaMember)
    {
        $GslsaPondaMember->delete();

        return redirect(route('GslsaPondaMembers.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AboutCanaconaMembers;
use Illuminate\Http\Request;

class AboutCanaconaMembersController extends Controller
{
    public function index()
    {
        $GslsaCanaconaMembers = AboutCanaconaMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.taluka.gslsacanaconamembers', compact('GslsaCanaconaMembers'));
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

        AboutCanaconaMembers::create($data);

        return redirect(route('GslsaCanaconaMembers.index'));
    }

    public function edit(AboutCanaconaMembers $GslsaCanaconaMember)
    {
        return view('gslsa.about.taluka.gslsacanaconamembersedit', compact('GslsaCanaconaMember'));
    }

    public function update(Request $request, AboutCanaconaMembers $GslsaCanaconaMember)
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

        $GslsaCanaconaMember->update($data);

        return redirect(route('GslsaCanaconaMembers.index'));
    }

    public function destroy(AboutCanaconaMembers $GslsaCanaconaMember)
    {
        $GslsaCanaconaMember->delete();

        return redirect(route('GslsaCanaconaMembers.index'));
    }
}

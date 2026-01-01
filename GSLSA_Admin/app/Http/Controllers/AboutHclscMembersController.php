<?php

namespace App\Http\Controllers;

use App\Models\AboutHclscMembers;
use Illuminate\Http\Request;

class AboutHclscMembersController extends Controller
{
    public function index()
    {
        $GslsaHclscMembers = AboutHclscMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.about.gslsahclscmembers', compact('GslsaHclscMembers'));
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

        AboutHclscMembers::create($data);

        return redirect(route('GslsaHclscMembers.index'));
    }

    public function edit(AboutHclscMembers $GslsaHclscMember)
    {
        return view('gslsa.about.gslsahclscmembersedit', compact('GslsaHclscMember'));
    }

    public function update(Request $request, AboutHclscMembers $GslsaHclscMember)
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

        $GslsaHclscMember->update($data);

        return redirect(route('GslsaHclscMembers.index'));
    }

    public function destroy(AboutHclscMembers $GslsaHclscMember)
    {
        $GslsaHclscMember->delete();

        return redirect(route('GslsaHclscMembers.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AboutBardezMembers;
use App\Models\AboutBicholimMembers;
use App\Models\AboutCanaconaMembers;
use App\Models\AboutHclscMembers;
use App\Models\AboutMembers;
use App\Models\AboutMormugaoMembers;
use App\Models\AboutNorthMembers;
use App\Models\AboutPernemMembers;
use App\Models\AboutPondaMembers;
use App\Models\AboutQuepemMembers;
use App\Models\AboutSalceteMembers;
use App\Models\AboutSanguemMembers;
use App\Models\AboutSattariMembers;
use App\Models\AboutSouthMembers;
use App\Models\AboutTiswadiMembers;

class AboutController extends Controller
{
    public function aboutusPage()
    {
        $members = AboutMembers::withoutTrashed()
            ->where('role_order', 1)       // Filter by role_order = 1
            ->orderBy('priority', 'asc')   // Sort by priority
            ->get();
        return view('gslsa.ABOUT.about_us', compact('members'));
    }

    public function membersPage()
    {
        $members = AboutMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();

        return view('gslsa.ABOUT.members', compact('members'));
    }

    public function hclscPage()
    {
        $GslsaHclscMembers = AboutHclscMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.hclsc', compact('GslsaHclscMembers'));
    }

    public function northPage()
    {
        $GslsaNorthMembers = AboutNorthMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.DISTRICT.north', compact('GslsaNorthMembers'));
    }

    public function southPage()
    {
        $GslsaSouthMembers = AboutSouthMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.DISTRICT.south', compact('GslsaSouthMembers'));
    }

    public function bardezPage()
    {
        $GslsaBardezMembers = AboutBardezMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.bardez', compact('GslsaBardezMembers'));
    }

    public function bicholimPage()
    {
        $GslsaBicholimMembers = AboutBicholimMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.bicholim', compact('GslsaBicholimMembers'));
    }

    public function canaconaPage()
    {
        $GslsaCanaconaMembers = AboutCanaconaMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.canacona', compact('GslsaCanaconaMembers'));
    }

    public function mormugaoPage()
    {
        $GslsaMormugaoMembers = AboutMormugaoMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.mormugao', compact('GslsaMormugaoMembers'));
    }

    public function pernemPage()
    {
        $GslsaPernemMembers = AboutPernemMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.pernem', compact('GslsaPernemMembers'));
    }

    public function pondaPage()
    {
        $GslsaPondaMembers = AboutPondaMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.ponda', compact('GslsaPondaMembers'));
    }

    public function quepemPage()
    {
        $GslsaQuepemMembers = AboutQuepemMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.quepem', compact('GslsaQuepemMembers'));
    }

    public function salcetePage()
    {
        $GslsaSalceteMembers = AboutSalceteMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.salcete', compact('GslsaSalceteMembers'));
    }

    public function sanguemPage()
    {
        $GslsaSanguemMembers = AboutSanguemMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.sanguem', compact('GslsaSanguemMembers'));
    }

    public function sattariPage()
    {
        $GslsaSattariMembers = AboutSattariMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.sattari', compact('GslsaSattariMembers'));
    }

    public function tiswadiPage()
    {
        $GslsaTiswadiMembers = AboutTiswadiMembers::withoutTrashed()
            ->orderBy('role_order', 'asc')  // Sort by role importance
            ->orderBy('priority', 'asc')    // Sort by additional priority within the same role
            ->get();
        return view('gslsa.ABOUT.TALUKA.tiswadi', compact('GslsaTiswadiMembers'));
    }
}

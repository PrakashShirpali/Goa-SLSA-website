<?php

namespace App\Http\Controllers;

class ActandRulesController extends Controller
{
    public function act1987Page()
    {
        return view('gslsa.ACT_& _RULES.act1987');
    }

    public function rulesPage()
    {
        return view('gslsa.ACT_& _RULES.rules');
    }

    public function regulationsPage()
    {
        return view('gslsa.ACT_& _RULES.regulations');
    }

    public function schemesPage()
    {
        return view('gslsa.ACT_& _RULES.schemes');
    }

    public function guidelinesPage()
    {
        return view('gslsa.ACT_& _RULES.guidelines');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ServicesLegalheir;

class ServicesController extends Controller
{
    public function legalaidPage()
    {
        $legal_heir = ServicesLegalheir::withoutTrashed()->get();
        return view('gslsa.SERVICES.legalaid', compact('legal_heir'));
    }

    public function lokadalatPage()
    {
        return view('gslsa.SERVICES.lokadalat');
    }

    public function lokadalatschemesPage()
    {
        return view('gslsa.SERVICES.lokadalatschemes');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\HomeNotices;
use App\Models\MiscellaneousNewsletter;
use App\Models\MiscellaneousRecruitment;

class MiscellaneousController extends Controller
{
    public function latestupdatesPage()
    {
        $homenotices = HomeNotices::withoutTrashed()
            ->orderBy('created_at', 'desc')
            ->get();
        return view('gslsa.MISCELLANEOUS.latestupdates', compact('homenotices'));
    }
    public function recruitmentPage()
    {
        $recruitment_notices = MiscellaneousRecruitment::withoutTrashed()->orderBy('created_at', 'desc')->get();
        return view('gslsa.MISCELLANEOUS.recruitment', compact('recruitment_notices'));
    }
    public function newsletterPage()
    {
        $newsletters = MiscellaneousNewsletter::withoutTrashed()->orderBy('created_at', 'desc')->get();
        return view('gslsa.MISCELLANEOUS.newsletter', compact('newsletters'));
    }
}

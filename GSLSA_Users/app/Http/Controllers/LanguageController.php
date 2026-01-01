<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        if (in_array($locale, ['en', 'kn'])) {
            session(['locale' => $locale]);
        }

        if ($locale === 'en') {
            $newSchema = 'english_schema';
        }
        if ($locale === 'kn') {
            $newSchema = 'konkani_schema';
        }

        session(['user_schema' => $newSchema]);

        return back();
    }
}

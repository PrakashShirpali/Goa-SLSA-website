<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        $newSchema = 'english_schema'; // default schema

        if ($locale === 'en') {
            $newSchema = 'english_schema';
        } elseif ($locale === 'kn') {
            $newSchema = 'konkani_schema';
        }

        session(['search_path' => $newSchema]);

        return back();
    }
}

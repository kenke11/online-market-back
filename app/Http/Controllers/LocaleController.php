<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use Illuminate\Http\JsonResponse;

class LocaleController extends Controller
{
    public function index(): JsonResponse
    {
        $locales = Locale::all();

        return response()->json([
            'locales' => $locales
        ]);
    }
}

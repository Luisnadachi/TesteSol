<?php

namespace App\Http\Controllers;

use App\Services\NumberRomanService;
use Illuminate\Http\Request;

class NumberRomanController extends Controller

{
    private NumberRomanService $service;

    public function __construct(NumberRomanService $service)
    {
        $this->service = $service;
    }

    public function NumberRoman(Request $request)
    {
        return response()->json(
            $this->service->parse($request->input('text'))
        );
    }

}

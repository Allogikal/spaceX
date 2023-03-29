<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class AllAnswersController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $answers = Answer::all();
        return response()->json([
            'data' => $answers,
            'code' => 200
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\LetterRequest;
use App\Models\Answer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __invoke(LetterRequest $request): JsonResponse
    {
        $answer = Answer::create($request->all());
        return response()->json([
            'data' => $answer,
            'code' => 200
        ]);
    }
}

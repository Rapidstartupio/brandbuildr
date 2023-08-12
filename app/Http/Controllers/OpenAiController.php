<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenAiController extends Controller
{
    public function completions(Request $request)
    {
        try {
            $url =  "https://api.openai.com/v1/completions";
            $response = Http::withToken(env('OPENAI_API_KEY'))->post($url, $request->all());
            return response()->json($response->object()->choices,  $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'message_type' => 'danger'
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function analyze(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        try {

            $response = Http::timeout(30)
                ->post('http://127.0.0.1:8000/analyze', [
                    'message' => $request->message
                ]);

            return response()->json($response->json());

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'FastAPI server is not running.',
                'details' => $e->getMessage()
            ],500);
        }
    }
    public function send(Request $request, $id)
{
    $request->validate([
        'message' => 'required|string',
    ]);

    Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $id,
        'message' => $request->message,
    ]);

    return back();
}
}
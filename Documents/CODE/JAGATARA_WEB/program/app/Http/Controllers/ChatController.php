<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'history' => 'nullable|array',
        ]);

        $message = $request->input('message');
        $history = $request->input('history', []);
        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'status' => 'error',
                'reply' => 'Maaf, kunci API Google Gemini (<code>GEMINI_API_KEY</code>) belum dikonfigurasi di file <code>.env</code>. Hubungi admin untuk mengaktifkan AI Chatbot.',
            ]);
        }

        // Format history for Gemini API
        $contents = [];
        if (is_array($history)) {
            foreach ($history as $chat) {
                if (isset($chat['role']) && isset($chat['text'])) {
                    $contents[] = [
                        'role' => $chat['role'] === 'user' ? 'user' : 'model',
                        'parts' => [
                            ['text' => $chat['text']]
                        ]
                    ];
                }
            }
        }

        // Append current user message
        $contents[] = [
            'role' => 'user',
            'parts' => [
                ['text' => $message]
            ]
        ];

        // Load System Prompt / Context dynamically from config/ai_context.txt
        $contextPath = config_path('ai_context.txt');
        if (file_exists($contextPath)) {
            $systemInstruction = file_get_contents($contextPath);
        } else {
            $systemInstruction = "Anda adalah Jagatara AI, asisten AI ramah dan profesional untuk program zero-waste Desa Rowokangkung, Lumajang oleh BEM Fasilkom UNEJ.";
        }

        try {
            // Using gemini-2.5-flash as it is highly stable and supported in this environment.
            $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;
            
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(15)->post($url, [
                'contents' => $contents,
                'systemInstruction' => [
                    'parts' => [
                        ['text' => $systemInstruction]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 800,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak dapat menghasilkan respon saat ini.';
                return response()->json([
                    'status' => 'success',
                    'reply' => $reply,
                ]);
            } else {
                Log::error('Gemini API Error: Status ' . $response->status() . ' - ' . $response->body());
                
                $errorMsg = 'Maaf, terjadi kesalahan saat menghubungi layanan AI. Silakan coba beberapa saat lagi.';
                if (config('app.debug')) {
                    $errorMsg .= '<br><br><strong>Debug Info (Gemini API):</strong><br>Status Code: ' . $response->status() . '<br>Response: <code>' . htmlspecialchars($response->body()) . '</code>';
                }

                return response()->json([
                    'status' => 'error',
                    'reply' => $errorMsg,
                ]);
            }

        } catch (\Exception $e) {
            Log::error('ChatController Exception: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'reply' => 'Terjadi kesalahan sistem saat memproses pesan Anda.',
            ]);
        }
    }
}

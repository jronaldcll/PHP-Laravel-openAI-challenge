<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatbotController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $chatbot_response = $this->generateChatbotResponse($data);
        return response()->json(['response' => $chatbot_response]);
    }

    private function generateChatbotResponse($prompt)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($prompt);
        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $result = $client->completions()->create([
            "model" => "text-davinci-003",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,
            'max_tokens' => 600,
            'prompt' => implode(" ", $prompt),
        ]);

        $content = trim($result['choices'][0]['text']);
        return $content;
    }
}

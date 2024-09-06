<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey ='sk-q6C1yvM9ygbguR1_y9yF6anFJw50J6ccLSKNlXcd_7T3BlbkFJ-oixbxe61MIQXIh46-2BiIXmCvbswvqIR2X4gnIsoA';
        // dd($this->apiKey);  // Debugging here

    }

    public function generateText($prompt)
    {
        $response = $this->client->post('https://api.openai.com/v1/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'text-davinci-004',  // or any other model
                'prompt' => $prompt,
                'max_tokens' => 150,
            ],
        ]);

        $responseBody = json_decode($response->getBody(), true);
        return $responseBody['choices'][0]['text'];
    }
}

<?php
namespace Slackbot;
use GuzzleHttp\Client;

class Openai {

    public function getImage($prompt) {
        $client = new Client();
        
        $url = "https://api.openai.com/v1/images/generations";
        $response = $client->request('POST', $url, [
            'headers' => [
                "Content-Type" => "application/json",
                "Authorization" => "Bearer " . $_ENV['OPENAI_API_KEY'],
            ],
            'json' => [
                "prompt" => $prompt,
                "n" => 1,
                "size" => "512x512"
            ]
        ]);
        $contents = $response->getBody()->getContents();
        $contents = json_decode($contents, true);

        return $contents['data'][0]['url'];
    }
}
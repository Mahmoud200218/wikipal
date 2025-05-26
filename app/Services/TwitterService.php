<?php

namespace App\Services;

use GuzzleHttp\Client;

class TwitterService
{
    protected $client;
    protected $bearerToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->bearerToken = env('TWITTER_ACCESS_TOKEN');
    }

    public function postToTwitter($message)
    {
        $url = "https://api.twitter.com/2/tweets";

        $response = $this->client->post($url, [
            'headers' => [
                'Authorization' => "Bearer {$this->bearerToken}",
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'text' => $message
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}

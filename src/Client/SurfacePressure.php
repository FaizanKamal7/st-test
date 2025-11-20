<?php

namespace App\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class SurfacePressure
{
    // TODO: implement HttpClientInterface and use it for API calls
    // TODO: get endpoint symfoDWD_ENDPOINT from environment variables or configuration

    private string $endpoint;

    public function __construct(string $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getPressureData(): ?array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === false) {
            return null;
        }

        $data = json_decode($response, true);

        return $data ?? null;
    }
}


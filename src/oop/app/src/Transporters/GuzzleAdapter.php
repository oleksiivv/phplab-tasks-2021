<?php

namespace src\oop\app\src\Transporters;

use src\oop\app\src\Transporters\TransportInterface;
use \GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }
    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $response = $this->client->request('GET', $url);

        return $response->getBody();
    }
}


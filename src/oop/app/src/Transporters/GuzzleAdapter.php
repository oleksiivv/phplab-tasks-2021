<?php

namespace src\oop\app\src\Transporters;

use src\oop\app\src\Transporters\TransportInterface;
use \GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $client = new Client();
        $response = $client->request('GET', $url);

        return $response->getBody();
    }
}


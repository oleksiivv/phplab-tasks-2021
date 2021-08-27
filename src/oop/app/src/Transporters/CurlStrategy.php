<?php

namespace src\oop\app\src\Transporters;

use src\oop\app\src\Transporters\TransportInterface;

class CurlStrategy implements TransportInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $content = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        curl_close($ch);

        return $this->encodeContent($content, $headerSize);
    }

    /**
     * @param string $content
     * @param int $headerSize
     * @return string
     */
    private function encodeContent($content, $headerSize): string
    {
        $tmpHeaders = substr($content, 0, $headerSize);
        $result = substr($content, $headerSize);

        $headers = array();
        foreach (explode("\n", $tmpHeaders) as $header)
        {
            $tmp = explode(":", trim($header), 2);
            if (count($tmp) > 1) {
                $headers[strtolower($tmp[0])] = trim(strtolower($tmp[1]));
            }
        }

        $encoding = "utf-8"; 
        if (isset($headers['content-type'])) {
            $tmp = explode("=", $headers['content-type']);
            if (count($tmp) > 1) {
                $encoding = $tmp[1];
            }
        }
        if ($encoding != "utf-8") {
            $result = iconv($encoding, "UTF-8", $result);
        }

        return $result;
    }
}

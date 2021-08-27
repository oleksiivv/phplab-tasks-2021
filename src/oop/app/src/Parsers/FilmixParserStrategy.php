<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use src\oop\app\src\Parsers\ParserInterface;

class FilmixParserStrategy implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return Movie
     */
    public function parseContent(string $siteContent): Movie
    {
        preg_match('/<h1[^>]*>(.*?)<\/h1>/si', $siteContent, $matchedTitle);
        preg_match('/<img src="([^"]*)" class="poster poster-tooltip"/i', $siteContent, $matchedPoster);
        preg_match('/<div class="full-story">(.*?)<\/div>/si', $siteContent, $matchedDescription);

        $movie = new Movie();
        $movie->setTitle($matchedTitle[1]);
        $movie->setPoster($matchedPoster[1]);
        $movie->setDescription($matchedDescription[1]);
        
        return $movie;
    }
}
<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use src\oop\app\src\Parsers\ParserInterface;

class FilmixParserStrategy implements ParserInterface
{
    private Movie $movie;

    public function __construct()
    {
        $this->movie = new Movie();
    }

    /**
     * @param string $siteContent
     * @return Movie
     */
    public function parseContent(string $siteContent): Movie
    {
        preg_match('/<h1[^>]*>(.*?)<\/h1>/si', $siteContent, $matchedTitle);
        preg_match('/<img src="([^"]*)" class="poster poster-tooltip"/i', $siteContent, $matchedPoster);
        preg_match('/<div class="full-story">(.*?)<\/div>/si', $siteContent, $matchedDescription);

        return $this->movie->setTitle($matchedTitle[1])
            ->setPoster($matchedPoster[1])
            ->setDescription($matchedDescription[1]);
    }
}
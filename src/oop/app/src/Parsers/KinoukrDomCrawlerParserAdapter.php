<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use src\oop\app\src\Parsers\ParserInterface;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    private Movie $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    /**
     * @param string $siteContent
     * @return Movie
     */
    public function parseContent(string $siteContent): Movie
    {
        $crawler = new Crawler($siteContent);
        $crawler = $crawler->filter('#dle-content');

        $title = $crawler->filter('h1')->first()->text();
        $poster = "https://kinoukr.com/". $crawler->filter('img')->first()->attr("src");
        $description = $crawler->filter(".fdesc")->first()->text();
        
        return $this->movie->setTitle($title)
            ->setPoster($poster)
            ->setDescription($description);
    }
}
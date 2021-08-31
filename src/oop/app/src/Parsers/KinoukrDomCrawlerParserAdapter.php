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
        
        return $this->movie->setTitle($crawler->filter('h1')->first()->text())
            ->setPoster("https://kinoukr.com/". $crawler->filter('img')->first()->attr("src"))
            ->setDescription($crawler->filter(".fdesc")->first()->text());
    }
}
<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use src\oop\app\src\Parsers\ParserInterface;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return Movie
     */
    public function parseContent(string $siteContent): Movie
    {
        $crawler = new Crawler($siteContent);

        $crawler = $crawler->filter('#dle-content');

        $movie = new Movie();
        $movie->setTitle($crawler->filter('h1')->first()->text());
        $movie->setPoster("https://kinoukr.com/". $crawler->filter('img')->first()->attr("src"));
        $movie->setDescription($crawler->filter(".fdesc")->first()->text());
        
        return $movie;
    }
}
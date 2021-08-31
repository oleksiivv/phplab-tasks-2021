<?php

namespace src\oop\app\src;

use src\oop\app\src\Parsers\KinoukrDomCrawlerParserAdapter;
use src\oop\app\src\Parsers\FilmixParserStrategy;
use src\oop\app\src\Transporters\CurlStrategy;
use src\oop\app\src\Transporters\GuzzleAdapter;
use src\oop\app\src\Models\Movie;
use Exception;

class ScrapperFactory
{
    /**
     * @param string $domain
     * @return Scrapper
     * @throws Exception
     */
    public function create(string $domain): Scrapper
    {
        switch ($domain) {
            case 'filmix':
                return new Scrapper(new CurlStrategy(), new FilmixParserStrategy(new Movie()));
            case 'kinoukr':
                return new Scrapper(new GuzzleAdapter(), new KinoukrDomCrawlerParserAdapter(new Movie()));
            default:
                throw new Exception('Resource not found!');
        }
    }
}
<?php

require_once 'src/web/functions.php';

use PHPUnit\Framework\TestCase;

class ClearAllFiltersTest extends TestCase
{
    protected function setUp(): void
    {
        
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input)
    {
        $_SERVER["PHP_SELF"] .= $input;

        $strNoFilters = clearAllFilters();
        
        $this->assertEquals($_SERVER["PHP_SELF"], $strNoFilters);
    }


    public function positiveDataProvider(): array
    {
        return [
            [
                "?page=1&sort=state",
            ],
            [
                "?filter-by-first-letter=A&sort=state",
            ],
            [
                "?filter-by-state=B",
            ],
            [
                "?filter-by-first-letter=A&filter-by-state=B",
            ],
        ];
    }
}

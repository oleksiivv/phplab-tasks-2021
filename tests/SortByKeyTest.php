<?php

require_once 'src/web/functions.php';

use PHPUnit\Framework\TestCase;

class SortByKeyTest extends TestCase
{
    protected function setUp(): void
    {
        
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $key, $expected)
    {
        $this->assertEquals($expected, sortByKey($input, $key));
    }


    public function positiveDataProvider(): array
    {
        return [
            [
                [
                    [
                        "name" => "Austin Bergstrom International Airport",
                    ],
                    [
                        "name" => "Nashville Metropolitan Airport 1",
                    ],
                    [
                        "name" => "Boise Airport",
                    ],
                    [
                        "name" => "Boston Logan International Airport",
                    ],

                ],
                "name",
                [
                    [
                        "name" => "Austin Bergstrom International Airport",
                    ],
                    [
                        "name" => "Boise Airport",
                    ],
                    [
                        "name" => "Boston Logan International Airport",
                    ],
                    [
                        "name" => "Nashville Metropolitan Airport 1",
                    ],
                ],
            ],
        ];
    }
}
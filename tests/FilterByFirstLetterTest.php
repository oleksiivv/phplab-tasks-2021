<?php

require_once 'src/web/functions.php';

use PHPUnit\Framework\TestCase;

class FilterByFirstLetterTest extends TestCase
{
    protected function setUp(): void
    {
        
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $key, $letter, $expected)
    {
        $this->assertEquals($expected, filterByFirstLetter($input, $key, $letter));
    }


    public function positiveDataProvider(): array
    {
        return [
            [
                [
                    [
                        "name" => "Austin Bergstrom International Airport",
                        "state" => "Maryland",
                    ],
                    [
                        "name" => "Nashville Metropolitan Airport 1",
                        "state" => "South Carolina",
                    ],
                    [
                        "name" => "Boise Airport",
                        "state" => "Michigan",
                    ],
                    [
                        "name" => "Boston Logan International Airport",
                        "state" => "New Jersey",
                    ],

                ],
                "name",
                "B",
                [
                    [
                        "name" => "Boise Airport",
                        "state" => "Michigan",
                    ],
                    [
                        "name" => "Boston Logan International Airport",
                        "state" => "New Jersey",
                    ],
                ],
            ],
            [
                [
                    [
                        "name" => "Austin Bergstrom International Airport",
                        "state" => "Maryland",
                    ],
                    [
                        "name" => "Nashville Metropolitan Airport 1",
                        "state" => "South Carolina",
                    ],
                    [
                        "name" => "Boise Airport",
                        "state" => "Michigan",
                    ],
                    [
                        "name" => "Boston Logan International Airport",
                        "state" => "New Jersey",
                    ],

                ],
                "state",
                "M",
                [
                    [
                        "name" => "Austin Bergstrom International Airport",
                        "state" => "Maryland",
                    ],
                    [
                        "name" => "Boise Airport",
                        "state" => "Michigan",
                    ],
                ],
            ],
        ];
    }
}
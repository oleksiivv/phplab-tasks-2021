<?php

require_once 'src/web/functions.php';

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    protected function setUp(): void
    {
        
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function testNegative()
    {
        $this->expectException(InvalidArgumentException::class);

        getUniqueFirstLetters([["a" => "aaa"], ["b" => "name"]]);
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
                ["A", "N", "B"],
            ],
            [
                [
                    [
                        "name" => "Hollywood Burbank Airport",
                    ],
                    [
                        "name" => "Baltimore Washington Airport",
                    ],
                    [
                        "name" => "Charleston International Airport",
                    ],
                    [
                        "name" => "Charlotte Douglas International Airport",
                    ],

                ],
                ["H", "B", "C"],
            ],
        ];
    }
}
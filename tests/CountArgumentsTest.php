<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, $this->functions->countArguments(...$input));
    }

    public function positiveDataProvider(): array
    {
        return array(
            array(
                array(
                    'a', 'b', 'c',
                ),
                array(
                    'argument_count' => 3,
                    'argument_values' => array(
                        'a', 'b', 'c',
                    ),
                ),
            ),
            array(
                array(
                    'a',
                ),
                array(
                    'argument_count' => 1,
                    'argument_values' => array(
                        'a',
                    ),
                ),
            ),

            array(
                array(
                    
                ),
                array(
                    'argument_count' => 0,
                    'argument_values' => array(),
                ),
            ),
        );
    }
}

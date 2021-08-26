<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($data)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->functions->countArgumentsWrapper($data);
    }

    public function negativeDataProvider(): array
    {
        return [
            [null],
            [array("abc", 1, 0, -1, 11.98)],
            [array(new stdClass())],
            [array(true, false, "abc")],
        ];
    }
}

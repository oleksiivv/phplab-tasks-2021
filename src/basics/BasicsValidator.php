<?php

declare(strict_types=1);

namespace basics;

use basics\BasicsValidatorInterface;

class BasicsValidator implements BasicsValidatorInterface
{
    
    /**
     * @param int $minute
     * @throws \InvalidArgumentException
     */
    public function isMinutesException(int $minute): void
    {
        if($minute<0 || $minute>=60){
            throw new \InvalidArgumentException("Exception: minute must be in range [0;60]");
        }
    }

    /**
     * @param int $year
     * @throws \InvalidArgumentException
     */
    public function isYearException(int $year): void
    {
        if($year<1900){
            throw new \InvalidArgumentException("Exception: year must be greater than 1900");
        }
    }

    /**
     * @param string $input
     * @throws \InvalidArgumentException
     */
    public function isValidStringException(string $input): void
    {
        if(strlen($input)!=6){
            throw new \InvalidArgumentException("Exception: invalid string length. Must be equal to 6 symbols");
        }
    }
}

<?php

declare(strict_types=1);

namespace basics;

use basics\BasicsInterface;
use basics\BasicsValidator;

class Basics implements BasicsInterface
{

    private BasicsValidator $baseValidator;

    private const HOUR_QUARTERS = ["first", "second", "third", "fourth"];

    public function __construct(BasicsValidator $baseValidator)
    {
        $this->baseValidator=$baseValidator;
    }

    /**
     * @param int $minute
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getMinuteQuarter(int $minute): string
    {
        $this->baseValidator->isMinutesException($minute);

        $result = "";
        if ($minute > 0 && $minute <= 15) {
            
            $result = self::HOUR_QUARTERS[0];

        } elseif ($minute > 15 && $minute <= 30) {

            $result = self::HOUR_QUARTERS[1];

        } elseif ($minute > 30 && $minute <= 45) {

            $result = self::HOUR_QUARTERS[2];

        } else {

            $result = self::HOUR_QUARTERS[3];
            
        }

        return $result;
    }

    /**
     * @param int $year
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isLeapYear(int $year): bool
    {
        
        $this->baseValidator->isYearException($year);
        
        if ((
            $year % 4 == 0
            && $year % 100 != 0)
            || $year % 400 == 0
        ) {
            return true;
        }

        return false;
    }

    /**
     * @param string $input
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isSumEqual(string $input): bool
    {
        $this->baseValidator->isValidStringException($input);
        
        $sumOfFirstPart = 0;
        $sumOfSecondPart = 0;

        for($i = 0; $i < strlen($input) / 2; $i++) {
            $sumOfFirstPart += (int) $input[$i];
        }
            
        for($i = strlen($input) / 2; $i < strlen($input); $i++) {
            $sumOfSecondPart += (int) $input[$i];
        }

        return $sumOfFirstPart === $sumOfSecondPart;
    }
}

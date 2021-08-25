<?php

declare(strict_types=1);

namespace strings;

use strings\StringsInterface;

class Strings implements StringsInterface
{

    /**
     * @param string $input
     * @return string
     */
    public function snakeCaseToCamelCase(string $input): string
    {
        return str_replace('_', '', lcfirst(ucwords($input, '_')));
    }

    /**
     * @param string $input
     * @return string
     */
    public function mirrorMultibyteString(string $input): string
    {
        $inputAsArray = explode(' ', $input);

        foreach ($inputAsArray as &$word) {
            $word = $this->utf8StringReverse($word);
        }

        return implode(' ', $inputAsArray);
    }

    /**
     * @param string $noun
     * @return string
     */
    public function getBrandName(string $noun): string
    {
        $result = "";

        if ($noun[-1] === $noun[0]) {
            $result = $noun . strstr($noun, $noun[1]);
            $result = ucfirst($result);
        } else {
            $result = "The " . ucfirst($noun);
        }

        return $result;
    }

    /**
     * @param string $input
     * @return string
     */
    private function utf8StringReverse(string $input): string
    {
        preg_match_all('/./us', $input, $arr);
        
        return join('', array_reverse($arr[0]));
    }
}
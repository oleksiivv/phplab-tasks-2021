<?php

declare(strict_types=1);

namespace arrays;

use arrays\ArraysInterface;

class Arrays implements ArraysInterface
{
    /**
     * @param array $input
     * @return array
     */
    public function repeatArrayValues(array $input): array
    {
        $result = [];
        $arrayCount = count($input);

        for ($i = 0; $i < $arrayCount; $i++) {
            for ($n = 0; $n < $input[$i]; $n++){
                $result[] = $input[$i];
            }
        }

        return $result;
    }

    /**
     * @param array $input
     * @return int
     */
    public function getUniqueValue(array $input): int
    {
        $uniqueValue = 0;
        $uniqueValues = [];

        if (count($input) === 0) {
            return $uniqueValue;
        }

        foreach ($input as $item) {
            if (!in_array($item, $uniqueValues)) {
                $uniqueValues[] = $item;
            }
        }

        $uniqueValue = null;
        foreach ($uniqueValues as $item) {
            if (count(array_keys($input, $item)) === 1) {
                if ($item < $uniqueValue || !isset($uniqueValue)) {
                    $uniqueValue = $item;
                }
            }
        }
        
        return isset($uniqueValue) ? $uniqueValue : 0;
    }

    /**
     * @param array $input
     * @return array
     */
    public function groupByTag(array $input): array
    {
        $result = [];
        foreach ($input as $fruits) {
            foreach ($fruits['tags'] as $tag) {
                $result[$tag][] = $fruits['name'];
            }
        }

        $keys = array_keys($result);
        $keysCount = count($keys);
        for ($i = 0; $i < $keysCount; $i++) {
            array_multisort($result[$keys[$i]], SORT_ASC);
        }

        return $result;
    }
}
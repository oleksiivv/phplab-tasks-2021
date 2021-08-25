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
            $result = array_merge($result, array_fill(count($result), $input[$i], $input[$i]));
        }

        return $result;
    }

    /**
     * @param array $input
     * @return int
     */
    public function getUniqueValue(array $input): int
    {
        $countedItems = array_count_values($input);
        $uniqueItems = array_filter($countedItems, function($item) {
            return $item === 1;
        });

        return count($uniqueItems) > 0 ? min(array_keys($uniqueItems)) : 0;
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
<?php

/**
 * @param  array  $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports)
{
    if(!array_key_exists('name', $airports[0])) {
        throw new \InvalidArgumentException("Exception: expecting dual dimentional array with key name in each row");
    }
    
    $firstLetters = [];

    foreach ($airports as $airport) {
        $firstLetters[] = $airport['name'][0];
    }

    $uniqueLetters = array_unique($firstLetters);
    sort($uniqueLetters);

    return $uniqueLetters;
}

/**
 * @param $airports
 * @param $firstLetter
 * @return string[]
 */
function filterByFirstLetter(array $airports, string $key, $firstLetter)
{
    $filtered = array_filter($airports, function($item) use ($key, $firstLetter) {
        return $item[$key][0] == $firstLetter;
    });

    return array_values($filtered);
}

/**
 * @param $airports
 * @param $key
 * @return string[]
 */
function sortByKey(array $airports, string $key)
{
    $newArray = $airports;
    usort($newArray, function($a, $b) use($key) {
        return $a[$key] > $b[$key];
    });
  
    return $newArray;

}

/**
 * @param $param
 * @param $value
 * @return string
 */
function addParamToURL($param, $value): string
{
    $query = $_GET;

    if($param !== "page") {
        $query["page"] = 1;
    }
    
    $query[$param] = $value;
    $query = http_build_query($query);

    return $_SERVER["PHP_SELF"] . '?' . $query;
}

/**
 * @param $page
 */
function openPage($page)
{
    echo addParamToURL("page", $page);
}

/**
 * @param $letter
 */
function addFilterByFirstLetter($letter)
{
    echo addParamToURL("filter-by-first-letter", $letter);
}

/**
 * @param $key
 */
function addSortKey($key)
{
    echo addParamToURL("sort", $key);
}

/**
 * @param $letter
 */
function addFilterByState($letter)
{
    echo addParamToURL("filter-by-state", $letter);
}

/**
 * @return string
 */
function clearAllFilters()
{
    return isset($_GET["page"]) ? '?page=' . $_GET['page'] : $_SERVER["PHP_SELF"];
}

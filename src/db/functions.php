<?php

require_once './QueryBuilder.php';


/**
 * @param PDO $pdo
 * @return array
 */
function getUniqueFirstLetters(PDO $pdo)
{

    $sth = $pdo->prepare('SELECT DISTINCT LEFT(name,1) FROM airports ORDER BY LEFT(name,1) ASC');
    
    $sth->execute();
    $uniqueLetters = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
    
    return $uniqueLetters;
}

/**
 * @param PDO $pdo
 * @return int
 */
function countRows(PDO $pdo)
{
    
    $sth = $pdo->prepare('SELECT COUNT(*) FROM airports');
    
    $sth->execute();
    $row = $sth->fetch();

    return $row[0];
}

/**
 * @param $queryBuilder
 * @param $key
 * @param $firstLetter
 */
function filterByFirstLetter(QueryBuilder $queryBuilder, $key, $firstLetter)
{
    $queryBuilder->addQueryParam("filter-first-letter-$key", $firstLetter);
}


/**
 * @param $queryBuilder
 * @param $key
 */
function sortByKey(QueryBuilder $queryBuilder, $key)
{
    $queryBuilder->addQueryParam("sortKey", $key);
}

/**
 * @param $queryBuilder
 * @param $itemsCount
 * @param $page
 */
function paginate(QueryBuilder $queryBuilder, $itemsCount, $page)
{
    $rows = $itemsCount;
    $last = ($page * 5 + 5 < $rows) ? $page * 5 + 5 : $rows;
    $queryBuilder->addQueryParam("limit-start-index", $page * 5);
    $queryBuilder->addQueryParam("limit-items-count", $last - $page * 5);
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

<?php

/** @var \PDO $pdo */
require_once './pdo_ini.php';


class QueryBuilder
{
    private $queryParams = [];

    /**
     * @param $command
     * @param $param
     */
    public function addQueryParam(string $command, string $param)
    {
        $this->queryParams[$command] = $param;
    }

    /**
     * @return array
     */
    public function buildQuery(): array
    {
        
        $params = [];
        $queryFilter = "";
        $querySort = "";
        $queryLimit = "";
        
        if (isset($this->queryParams["filter-first-letter-name"])) {
           
            if(strlen($queryFilter) === 0) {
                $queryFilter = " WHERE a.name LIKE CONCAT(:firstLetterName, '%')";
            }
            else{
                $queryFilter .= " AND a.name LIKE CONCAT(:firstLetterName, '%')";
            }
            
            $params[':firstLetterName'] = $this->queryParams["filter-first-letter-name"];
        }
        if (isset($this->queryParams["filter-first-letter-state"])) {
           
            if(strlen($queryFilter) === 0) {
                $queryFilter = " WHERE s.name LIKE CONCAT(:firstLetterState, '%')";
            }
            else{
                $queryFilter .= " AND s.name LIKE CONCAT(:firstLetterState, '%')";
            }
            
            $params[':firstLetterState'] = $this->queryParams["filter-first-letter-state"];
        }
        if (isset($this->queryParams["sortKey"])) {
            $column = $this->queryParams['sortKey'];
            $querySort = " ORDER BY $column ";
        }
        if (isset($this->queryParams["limit-items-count"])) {
            $queryLimit = " LIMIT :startIndex, :itemsCount ";
            $params[':startIndex'] = $this->queryParams["limit-start-index"];
            $params[':itemsCount'] = $this->queryParams["limit-items-count"];
        }

        $query = "SELECT a.name, a.code, a.address, a.timezone, c.name AS city, s.name AS state FROM airports AS a 
                    INNER JOIN cities AS c ON a.city_id = c.id 
                    INNER JOIN states AS s ON a.state_id = s.id"
                    . $queryFilter . $querySort . $queryLimit;

        global $pdo;
        $sth = $pdo->prepare($query);
        $sth->setFetchMode(\PDO::FETCH_ASSOC);
        
        foreach ($params as $key => $value) {
            if ($key === ':startIndex' || $key === ':itemsCount') {
                $sth->bindValue($key, $value, \PDO::PARAM_INT);
            }
            else {
                $sth->bindValue($key, $value, \PDO::PARAM_STR);
            }
        }

        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}
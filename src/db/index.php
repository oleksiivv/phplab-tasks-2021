<?php

/** @var \PDO $pdo */
require_once './pdo_ini.php';
require_once './functions.php';


$queryBuilder = new QueryBuilder();

$uniqueFirstLetters = getUniqueFirstLetters($pdo);


if (isset($_GET["filter-by-first-letter"])) {
    filterByFirstLetter($queryBuilder, 'name', $_GET["filter-by-first-letter"]);    
}

if (isset($_GET["filter-by-state"])) {
    filterByFirstLetter($queryBuilder, 'state', $_GET["filter-by-state"]);    
}
 
if (isset($_GET["sort"])) {
   sortByKey($queryBuilder, $_GET["sort"]);    
}


paginate($queryBuilder, countRows($pdo), isset($_GET["page"]) ? $_GET["page"] -1 : 0);

 

$airports = $queryBuilder->buildQuery();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Airports</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">

    <h1 class="mt-5">US Airports</h1>

    <div class="alert alert-dark">
        Filter by first letter:

        <?php foreach ($uniqueFirstLetters as $letter): ?>
            <a href='<?= addFilterByFirstLetter($letter) ?>'><?= $letter ?></a>
        <?php endforeach; ?>

        <a href='<?= clearAllFilters() ?>' class="float-right">Reset all filters</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col"><a href='<?= addSortKey('a.name') ?>'>Name</a></th>
            <th scope="col"><a href='<?= addSortKey('a.code') ?>'>Code</a></th>
            <th scope="col"><a href='<?= addSortKey('s.name') ?>'>State</a></th>
            <th scope="col"><a href='<?= addSortKey('c.name') ?>'>City</a></th>
            <th scope="col">Address</th>
            <th scope="col">Timezone</th>
        </tr>
        </thead>
        <tbody>
        
        <?php 
            
            foreach ($airports as $airport): 
        ?>
        <tr>
            <td><?= $airport['name'] ?></td>
            <td><?= $airport['code'] ?></td>
            <td><a href='<?= addFilterByState($airport['state'][0]) ?>'><?= $airport['state'] ?></a></td>
            <td><?= $airport['city'] ?></td>
            <td><?= $airport['address'] ?></td>
            <td><?= $airport['timezone'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="Navigation">
        <ul class="pagination justify-content-center">
        <?php 
                $countOfPages = countRows($pdo) / 5;
                
                $firstShowedPage = isset($_GET["page"]) ? $_GET["page"] : 0;
                $firstShowedPage = ($firstShowedPage - 2 > 0) ? $firstShowedPage - 2 : 1;
                $lastShowedPage = ($firstShowedPage + 5 < $countOfPages) ? $firstShowedPage + 5 : $countOfPages+1;

                for ($i = $firstShowedPage; $i < $lastShowedPage; $i++):
            ?>
                    <li class="page-item <?= ((!isset($_GET['page']) && $i === 1) || $_GET['page'] == $i) ? 'active' : '' ?> ">
                        <a class="page-link" href='<?= openPage($i) ?>'>
                            <?= $i ?>
                        </a>
                    </li>
            <?php endfor; ?>
        </ul>
    </nav>

</main>
</html>

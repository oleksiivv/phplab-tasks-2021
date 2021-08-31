<?php
require_once './functions.php';

$airports = require './airports.php';


if (isset($_GET["filter-by-first-letter"])) {
    $airports = filterByFirstLetter($airports, "name", $_GET["filter-by-first-letter"]);    
}

if (isset($_GET["filter-by-state"])) {
    $airports = filterByFirstLetter($airports, "state", $_GET["filter-by-state"]);    
}
 
if (isset($_GET["sort"])) {
    $airports = sortByKey($airports, $_GET["sort"]);    
}


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

        <?php foreach (getUniqueFirstLetters($airports) as $letter): ?>
            <a href='<?= addFilterByFirstLetter($letter) ?>'><?= $letter ?></a>
        <?php endforeach; ?>

        <a href='<?= clearAllFilters() ?>' class="float-right">Reset all filters</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col"><a href='<?= addSortKey("name") ?>'>Name</a></th>
            <th scope="col"><a href='<?= addSortKey("code") ?>'>Code</a></th>
            <th scope="col"><a href='<?= addSortKey("state") ?>'>State</a></th>
            <th scope="col"><a href='<?= addSortKey("city") ?>'>City</a></th>
            <th scope="col">Address</th>
            <th scope="col">Timezone</th>
        </tr>
        </thead>
        <tbody>
        
        <?php 
            $first = isset($_GET["page"]) ? ($_GET["page"] - 1) * 5 : 0;
            $last = ($first + 5 < count($airports)) ? $first + 5 : count($airports);
            for ($i = $first; $i < $last; $i++): 
        ?>
        <tr>
            <td><?= $airports[$i]['name'] ?></td>
            <td><?= $airports[$i]['code'] ?></td>
            <td><a href='<?= addFilterByState($airports[$i]['state'][0]) ?>'><?= $airports[$i]['state'] ?></a></td>
            <td><?= $airports[$i]['city'] ?></td>
            <td><?= $airports[$i]['address'] ?></td>
            <td><?= $airports[$i]['timezone'] ?></td>
        </tr>
        <?php endfor; ?>
        </tbody>
    </table>

    <nav aria-label="Navigation">
        <ul class="pagination justify-content-center">
            <?php 
                $countOfPages = ceil(count($airports) / 5);
                
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

<?php

require __DIR__ . '/../../vendor/autoload.php';

use \PlayersApp\Players;
use \PlayersApp\Strategies;

$args = null;
parse_str(implode('&', array_slice($argv, 1)), $args);


echo "\nManaging Players of type 1...\n";

$playersOfType1 = new Players(
    new Strategies\Exporting\ExportingAsCsvStrategy(),
    new Strategies\Sorting\SortingWithBubblesortStrategy(),
    new Strategies\Storing\StoringInCloudStrategy()
);

// sorting, storing, exporting
$playersOfType1->sort()->store()->export();


echo "\n\nManaging Players of type 2...\n";

$playersOfType2 = new Players(
    new Strategies\Exporting\ExportingAsExcelStrategy(),
    new Strategies\Sorting\SortingWithQuicksortStrategy(),
    new Strategies\Storing\StoringInDatabaseStrategy()
);

$playersOfType2->sort()->store()->export();


echo "\n\nAll done!\n";

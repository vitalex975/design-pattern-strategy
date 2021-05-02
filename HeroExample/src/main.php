<?php

require __DIR__ . '/../../vendor/autoload.php';

use \HeroApp\Hero;
use \HeroApp\Strategies;

$args = null;
parse_str(implode('&', array_slice($argv, 1)), $args);


echo "\n\nCreating a Wizard by strategies...";
$wizard = new Hero(
    new Strategies\Walking\BipedWalkingStrategy(),
    new Strategies\Running\BipedRunningStrategy(),
    new Strategies\Swimming\FloatingSwimmingStrategy(),
    new Strategies\Fighting\MagicFightingStrategy()
);

$wizard->walk();
$wizard->run();
$wizard->swim();
$wizard->fight();


echo "\n\nCreating an Archer by strategies...";
$archer = new Hero(
    new Strategies\Walking\BipedWalkingStrategy(),
    new Strategies\Running\BipedRunningStrategy(),
    new Strategies\Swimming\NormalSwimmingStrategy(),
    new Strategies\Fighting\BowFightingStrategy()
);

$archer->walk();
$archer->run();
$archer->swim();
$archer->fight();


echo "\n\nCreating a Knight by strategies...";
$knight = new Hero(
    new Strategies\Walking\QuadrupedWalkingStrategy(),
    new Strategies\Running\QuadrupedRunningStrategy(),
    new Strategies\Swimming\NoSwimmingStrategy(),
    new Strategies\Fighting\SwordFightingStrategy()
);

$knight->walk();
$knight->run();
$knight->swim();
$knight->fight();


echo "\n\nCreating a Centaur by strategies...";
$centaur = new Hero(
    new Strategies\Walking\QuadrupedWalkingStrategy(),
    new Strategies\Running\QuadrupedRunningStrategy(),
    new Strategies\Swimming\NoSwimmingStrategy(),
    new Strategies\Fighting\BowFightingStrategy()
);

$centaur->walk();
$centaur->run();
$centaur->swim();
$centaur->fight();


echo "\n\nAll done!\n";

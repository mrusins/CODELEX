<?php
require_once 'VehicleInterface.php';
require_once 'RacersCollection.php';
require_once 'vehicles/Car.php';
require_once 'vehicles/Bike.php';
require_once 'Track.php';
require_once 'Game.php';


$race = new RacersCollection();
$race->setRacer(new Bike(1,1,5,10 ));
$race->setRacer(new Car(2,1,4,5 ));
$race->setRacer(new Bike(3,1,6,10 ));
$race->setRacer(new Car(4,2,5,20 ));

$game = new Game($race->getAllRacers());

while (true){

    $game->run();
    sleep(1);
    print("\033[2J\033[;H");
    echo PHP_EOL;
    foreach ($game->printTrack() as $item) {
    echo implode(' ', $item).PHP_EOL;
    }
    foreach ($game->scores() as $r=>$t) {
        echo 'Private number: '.$r. '  time: '. $t .PHP_EOL;
    }
}







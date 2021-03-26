<?php

require_once 'vendor/autoload.php';

use App\Choice;
use App\ChoiceCollection;
use App\Game;

$collection = new ChoiceCollection();
$collection->setCollection(new Choice('Rock', ['Scissors', 'Lizard']));
$collection->setCollection(new Choice('Paper', ['Rock', 'Spock']));
$collection->setCollection(new Choice('Scissors', ['Paper', 'Lizard']));
$collection->setCollection(new Choice('Spock', ['Scissors', 'Rock']));
$collection->setCollection(new Choice('Lizard', ['Paper', 'Spock']));

$game = new Game($_POST, $collection->getChoiceCollection());
$game->game($game->computerChoice());

require_once __DIR__ . '/views/main.php';




<?php

namespace Tests;

use App\ChoiceCollection;
use App\Choice;

use PHPUnit\Framework\TestCase;

class ChoiceCollectionTest extends TestCase
{

    public function testCount()
    {

        $choices = new ChoiceCollection();
        $choices->setCollection(new Choice('Rock', ['Scissors', 'Lizard']));
        $choices->setCollection(new Choice('Paper', ['Rock', 'Spock']));
        $choices->setCollection(new Choice('Scissors', ['Paper', 'Lizard']));
        $choices->setCollection(new Choice('Spock', ['Scissors', 'Rock']));
        $choices->setCollection(new Choice('Lizard', ['Paper', 'Spock']));

        $this->assertEquals(5, count($choices->getChoiceCollection()), 'wrong game option count');


    }

    public function testPowerCount()
    {
        $choices = new ChoiceCollection();
        $choices->setCollection(new Choice('Rock', ['Scissors', 'Lizard']));
        $choices->setCollection(new Choice('Paper', ['Rock', 'Spock']));
        $choices->setCollection(new Choice('Scissors', ['Paper', 'Lizard']));
        $choices->setCollection(new Choice('Spock', ['Scissors', 'Rock']));
        $choices->setCollection(new Choice('Lizard', ['Paper', 'Spock']));
        $i = 0;
        foreach ($choices->getChoiceCollection() as $item) {
            $this->assertEquals(2, count($item->power), 'Wrong power count in No: ' . $i);
            $i++;
        }

    }
}
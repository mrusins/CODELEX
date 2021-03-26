<?php

namespace Tests;

use App\ChoiceCollection;
use App\Choice;

use App\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    private array $post = ["Rock" => 'Rock'];

    private function collection(): array
    {
        $choices = new ChoiceCollection();
        $choices->setCollection(new Choice('Rock', ['Scissors', 'Lizard']));
        $choices->setCollection(new Choice('Paper', ['Rock', 'Spock']));
        $choices->setCollection(new Choice('Scissors', ['Paper', 'Lizard']));
        $choices->setCollection(new Choice('Spock', ['Scissors', 'Rock']));
        $choices->setCollection(new Choice('Lizard', ['Paper', 'Spock']));
        return $choices->getChoiceCollection();

    }

    public function testPower()
    {
        $test = new Game($this->post, $this->collection());
        $test->game($test->computerChoice());
        foreach ($this->collection() as $item) {
            if ($item->symbol == 'Rock') {
                $this->assertContains('Scissors', $item->power, 'Rock error');
                $this->assertContains('Lizard', $item->power, 'Rock error');
            } elseif ($item->symbol == 'Paper') {
                $this->assertContains('Rock', $item->power, 'Paper error');
                $this->assertContains('Spock', $item->power, 'Paper error');
            } elseif ($item->symbol == 'Scissors') {
                $this->assertContains('Paper', $item->power, 'Scissors error');
                $this->assertContains('Lizard', $item->power, 'Scissors error');
            } elseif ($item->symbol == 'Spock') {
                $this->assertContains('Rock', $item->power, 'Spock error');
                $this->assertContains('Scissors', $item->power, 'Spock error');
            } elseif ($item->symbol == 'Lizard') {
                $this->assertContains('Paper', $item->power, 'Lizard error');
                $this->assertContains('Spock', $item->power, 'Lizard error');
            }

        }
    }

    public function testPcChoice()
    {
        $test = new Game($this->post, $this->collection());
        $test->game($test->computerChoice());
        $choices = ['Rock', 'Paper', 'Scissors', 'Spock', 'Lizard'];
        $this->assertContains($test->pcChoice(), $choices, 'Not in array');
    }

    public function testMyChoice()
    {
        $test = new Game($this->post, $this->collection());
        $test->game($test->computerChoice());
        $choices = ['Rock', 'Paper', 'Scissors', 'Spock', 'Lizard'];
        $this->assertContains($test->myChoice(), $choices, 'Not in array');
    }

    public function testWinnerRock()
    {
        $myChoice = $post = ["Rock" => 'Rock'];
        $test = new Game($myChoice, $this->collection());

        $test->game('Scissors');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Scissors');
        $test->game('Lizard');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Lizard');
        $test->game('Rock');
        $this->assertEquals('TIE', $test->getWinner(), 'Rock-Rock');
        $test->game('Spock');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Spock');
        $test->game('Paper');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Paper');
    }

    public function testWinnerPaper()
    {
        $myChoice = $post = ["Paper" => 'Paper'];
        $test = new Game($myChoice, $this->collection());

        $test->game('Rock');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Scissors');
        $test->game('Spock');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Lizard');
        $test->game('Paper');
        $this->assertEquals('TIE', $test->getWinner(), 'Rock-Rock');
        $test->game('Scissors');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Spock');
        $test->game('Lizard');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Paper');
    }

    public function testWinnerScissors()
    {
        $myChoice = $post = ["Scissors" => 'Scissors'];
        $test = new Game($myChoice, $this->collection());

        $test->game('Paper');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Scissors');
        $test->game('Lizard');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Lizard');
        $test->game('Scissors');
        $this->assertEquals('TIE', $test->getWinner(), 'Rock-Rock');
        $test->game('Spock');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Spock');
        $test->game('Rock');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Paper');
    }

    public function testWinnerSpock()
    {
        $myChoice = $post = ["Spock" => 'Spock'];
        $test = new Game($myChoice, $this->collection());

        $test->game('Scissors');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Scissors');
        $test->game('Rock');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Lizard');
        $test->game('Spock');
        $this->assertEquals('TIE', $test->getWinner(), 'Rock-Rock');
        $test->game('Lizard');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Spock');
        $test->game('Paper');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Paper');
    }

    public function testWinnerLizard()
    {
        $myChoice = $post = ["Lizard" => 'Lizard'];
        $test = new Game($myChoice, $this->collection());

        $test->game('Paper');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Scissors');
        $test->game('Spock');
        $this->assertEquals('You win!', $test->getWinner(), 'Rock-Lizard');
        $test->game('Lizard');
        $this->assertEquals('TIE', $test->getWinner(), 'Rock-Rock');
        $test->game('Rock');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Spock');
        $test->game('Scissors');
        $this->assertEquals('PC win!', $test->getWinner(), 'Rock-Paper');
    }

}
<?php

namespace App;


class Game
{
    private array $collection = [];
    private array $pcCollection = [];
    private array $power = [];
    private string $post = '';
    private string $winner = '';
    private string $pcChoice = '';


    public function __construct(array $posts, array $collection)
    {
        foreach ($posts as $choice) {
            $this->post = $choice;
        }
        foreach ($collection as $choice) {
            array_push($this->pcCollection, $choice->symbol);


            if ($choice->symbol == $this->post) {
                $this->power = $choice->power;

            }

        }
        $this->collection = $collection;
    }

    public function pcChoice(): string
    {

        return $this->pcChoice;
    }

    public function getWinner(): string
    {
        return $this->winner;
    }

    public function game(string $computerChoice): void
    {
        $this->pcChoice = $computerChoice;

        if ($this->post == $computerChoice) {
            $this->winner = 'TIE';
        } elseif (in_array($computerChoice, $this->power)) {
            $this->winner = 'You win!';
        } else {
            $this->winner = 'PC win!';
        }
    }

    public function myChoice(): string
    {
        return $this->post;
    }

    public function computerChoice(): string
    {
        return $computerChoice = $this->pcCollection[rand(0, count($this->pcCollection) - 1)];
    }
}
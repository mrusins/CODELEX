<?php

class Movie
{
    private array $title;
    private array $studio;
    private array $rating;
    private array $test = [];


    function __construct($title, $studio, $rating)
    {
        $this->title[] = $title;
        $this->studio[] = $studio;
        $this->rating[] = $rating;

    }

    public function test(): array
    {
        for ($i = 0; $i < count($this->rating); $i++) {
            if ($this->rating[$i] == 'PG') {
                array_push($this->test, $this->title[$i]);
                array_push($this->test, $this->studio[$i]);
            }

        }
        return $this->test;
    }
}

$movies = array(
    new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    new Movie('Glass', 'Buena Vista Productions', 'PG13'),
    new Movie('Spider Man', 'Columbia Pictures', 'PG')
);

foreach ($movies as $movie) {
    var_dump($movie->test());
}


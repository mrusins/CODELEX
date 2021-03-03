<?php

class Video
{
    public string $title;
    public bool $isAvailable;
    public int $averageRating;
    public string $checkedOut;
    public string $returned;
    public int $rating;

    function __construct(string $title, bool $isAvailable, int $averageRating, string $checkedOut, string $returned, string $rating)
    {
        $this->title = $title;
        $this->isAvailable = $isAvailable;
        $this->averageRating = $averageRating;
        $this->checkedOut = $checkedOut;
        $this->returned = $returned;
        $this->rating = $rating;
    }
}
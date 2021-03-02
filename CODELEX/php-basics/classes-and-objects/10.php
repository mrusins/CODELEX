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

class VideoStore
{
    private array $allVideos = [];

    public function addVideo(Video $video): void
    {
        $this->allVideos[] = $video;
    }

    public function getAllVideos(): void
    {
        echo PHP_EOL;
        foreach ($this->allVideos as $array => $video) {

            echo '"-' . $video->title . '-"' . ' Is available: ' . $video->isAvailable . '. With average rating in %: ' . $video->averageRating . PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function checkOut(string $title, string $date): void
    {
        foreach ($this->allVideos as $array => $video) {

            if ($video->title == $title) {
                $video->isAvailable = false;
                $video->checkedOut = $date;
            }
        }
    }

    public function return(string $title, string $date, int $rating): void
    {
        foreach ($this->allVideos as $array => $video) {

            if ($video->title == $title) {
                $video->isAvailable = true;
                $video->returned = $date;
                $video->averageRating = ($video->averageRating + $rating) / 2;
            }
        }
    }

    public function getAvailableVideos(): void
    {
        foreach ($this->allVideos as $array => $video) {

            if ($video->isAvailable === true) {
                echo '"-' . $video->title . '-"' . '. With average rating in %: ' . $video->averageRating . PHP_EOL;
            }
        }
        echo PHP_EOL;
    }
}

$store = new VideoStore();

$store->addVideo(new Video('The Matrix', true, 50, '01.03.21', '02.03.21', 0));
$store->addVideo(new Video('Godfather II', false, 50, '21.01.21', '', 0));
$store->addVideo(new Video('Star Wars Episode IV:A New Hope', true, 50, '21.01.21', '23.01.21', 0));

$store->checkOut('The Matrix', '02.03.21');

$store->return('The Matrix', '03.03.21', 100);

$store->getAllVideos();

$store->getAvailableVideos();



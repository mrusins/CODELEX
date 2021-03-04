<?php

class VideoStore
{
    public array $allVideos = [];

    public function addVideo(Video $video): void
    {
        $this->allVideos[] = $video;
    }

    public function addMovie(string $title, bool $isAvailable, int $averageRating, string $checkedOut, string $returned, string $rating): void
    {
        $this->addVideo(new Video($title, $isAvailable, $averageRating, $checkedOut, $returned, $rating));
    }

    public function getAllVideos(): void
    {
        echo PHP_EOL;
        foreach ($this->allVideos as $array => $video) {
            echo '"-' . $video->title . '-"' . $this->isAvailable($video->isAvailable) . '. With average rating in %: '
                . $video->averageRating . ' Last rent: ' . $video->checkedOut . ' Last return: ' . $video->returned . PHP_EOL;
        }
        echo PHP_EOL;
    }

 public function return(string $title, int $rating): void
    {
        foreach ($this->allVideos as $array => $video) {

            if ($video->title == $title) {
                $video->isAvailable = true;
                $video->returned = date("d/m/Y");
                $video->averageRating = ($video->averageRating + $rating) / 2;
            } else {echo 'Wrong name'.PHP_EOL;}
        }
    }

    public function rentVideo(string $name):void
    {
        foreach ($this->allVideos as $array => $video) {
            if ($video->title === $name) {
                $video->isAvailable = false;
                $video->checkedOut = date("d/m/Y");
            } else {echo 'Wrong name'.PHP_EOL;}
        }
    }

    private function isAvailable(bool $video): string
    {
        if ($video == true) {
            return 'Video IS available';
        } else {
            return 'Video is NOT available';
        }
    }

}
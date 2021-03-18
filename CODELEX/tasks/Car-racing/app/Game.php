<?php

namespace App;


class Game
{
    private array $racersCollection;
    private Track $track;
    private int $racersSpeed;
    private int $racersCount;
    private int $raceTime = 0;
    private array $racerActualPosition = [];
    private array $trackArray = [];
    private array $scoreBoard = [];
    private array $crashArray = [];
    private int $isCrash;

    public function __construct(array $racersCollection)
    {
        $this->racersCollection = $racersCollection;
        $this->track = new Track();
        $this->racersCount = count($this->racersCollection);
        for ($i = 0; $i < $this->racersCount; $i++) {
            $this->racerActualPosition[$i] = 0;
            $this->crashArray[$i] = 0;
        }
    }

    public function run()
    {
        $this->raceTime++;
        $i = 0;
        $this->trackArray = $this->track->getTrack($this->racersCount);

        foreach ($this->racersCollection as $racer) {
            $this->generateCrash();
            $this->generateSpeed($racer->minSpeed, $racer->maxSpeed);
            if ($this->racerActualPosition[$i] < count($this->trackArray[$i]) && $this->crashArray[$i] == 0
                && $this->isCrash > $racer->crashRating) {
                $this->scoreBoard[$racer->id] = $this->raceTime;
                $this->trackArray[$i][$this->racerActualPosition[$i]] = $racer->id;
                $this->racerActualPosition[$i] += $this->racersSpeed;
            } elseif ($this->isCrash <= $racer->crashRating && $this->racerActualPosition[$i] < count($this->trackArray[$i])
                || $this->crashArray[$i] == 1) {
                $this->crashArray[$i] = 1;
                $this->trackArray[$i][$this->racerActualPosition[$i]] = "X";
                $this->scoreBoard[$racer->id] = 'CRASH';
            } else {
                $this->trackArray[$i][count($this->trackArray[$i])] = $racer->id;
            }
            $i++;
        }
    }

    public function scores(): array
    {
        asort($this->scoreBoard);
        return $this->scoreBoard;
    }

    private function generateSpeed(int $min, $max): void
    {
        $this->racersSpeed = rand($min, $max);
    }

    public function generateCrash(): void
    {
        $this->isCrash = rand(1, 100);
    }

    public function printTrack(): array
    {
        return $this->trackArray;
    }

}

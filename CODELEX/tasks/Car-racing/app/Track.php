<?php
namespace App;
class Track
{
    private array $track;

    public function getTrack(int $racersCount): array
    {
        $this->generateTrack($racersCount);
        return $this->track;
    }

    private function generateTrack(int $racersCount)
    {

        for ($c = 0; $c < $racersCount; $c++) {
            $this->track[$c] = array();
            for ($r = 0; $r < 30; $r++) { // track length
                $this->track[$c][$r] = '‧';
            }
        }
    }

}
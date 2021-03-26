<?php

namespace App;

class ChoiceCollection
{
    private array $collection = [];


    public function setCollection(Choice $choice): void
    {
        array_push($this->collection, $choice);
    }

    public function getChoiceCollection(): array
    {
        return $this->collection;
    }
}

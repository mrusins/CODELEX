<?php

class RecipeCollection
{
    public array $collection;

    public function setRecipeCollection(Recipe $collection): void
    {
        $this->collection[] = $collection;
    }

    public function getRecipeCollection()
    {
        return $this->collection;
    }

}
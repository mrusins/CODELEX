<?php

class Recipe
{
    public string $name;

    function __construct(string $name, array $ingredients)
    {
        $this->name = $name;
        $this->ingredients = $ingredients;
    }
}

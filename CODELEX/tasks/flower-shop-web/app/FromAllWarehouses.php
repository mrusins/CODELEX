<?php
namespace App;

class FromAllWarehouses
{
    public array $arrayFromAllWarehouses;

    public function setToTotal(array $allItems)
    {
        $this->arrayFromAllWarehouses = $allItems;

    }

    public function getFromTotal(): array
    {
        return $this->arrayFromAllWarehouses;
    }
}
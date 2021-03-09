<?php

interface WarehouseInterface
{
    public function getFromWarehouse(array $stock): array;
}
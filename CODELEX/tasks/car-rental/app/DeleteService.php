<?php

namespace App;


class DeleteService
{

    private array $all;

    public function __construct()
    {
        $allCars = new CarCollection();
        $allCars->setCars();
        $this->all = $allCars->getCars();

    }

    public function deleteCar(array $post)
    {
        $i = 1;
        if (key($post) == 'delete') {
            foreach ($this->all as $item => $value) {
                if ($post['delete'] == $value->id) {
                    unset($this->all[$i - 1]);
                    $newJsonString = json_encode($this->all);
                    file_put_contents('app/garage/garage.json', $newJsonString);
                }
                $i++;
            }
        }
    }


}
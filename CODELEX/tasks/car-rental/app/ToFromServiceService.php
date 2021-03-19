<?php

namespace App;


class ToFromServiceService
{

    private array $all;

    public function __construct()
    {
        $allCars = new CarCollection();
        $allCars->setCars();
        $this->all = $allCars->getCars();

    }

    public function toFromService(array $post)
    {
        $i = 1;
        if (isset($post['service']) && isset($post['toService'])) {
            foreach ($this->all as $item => $value) {
                if ($post['service'] == $value->id) {
                    $value->status = 'in service';
                    $newJsonString = json_encode($this->all);
                    file_put_contents('app/garage/garage.json', $newJsonString);
                }
                $i++;
            }
        }
        if (isset($post['service']) && isset($post['fromService'])) {
            foreach ($this->all as $item => $value) {
                if ($post['service'] == $value->id) {
                    $value->status = 'yes';
                    $newJsonString = json_encode($this->all);
                    file_put_contents('app/garage/garage.json', $newJsonString);
                }
                $i++;
            }
        }
    }


}
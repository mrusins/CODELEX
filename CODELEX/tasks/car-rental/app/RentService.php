<?php

namespace App;


class RentService
{
    private array $post;

    public function __construct(array $post)
    {
        $this->post = $post;
    }

    public function dbService(): array
    {
        $rent = new CarCollection();
        $rent->setCars();
        if (count($this->post) == 1) {
            foreach ($rent->getCars() as $key => $value) {
                if (key($this->post) == $value->id && $this->post[$value->id] == 'RENT') {
                    $value->status = 'not avail';
                    $rent->seveToJson();
                }
                if (key($this->post) == $value->id && $this->post[$value->id] == 'RETURN') {
                    $value->status = 'avail';
                    $rent->seveToJson();
                }
            }
        }
        return $rent->getCars();


    }
}
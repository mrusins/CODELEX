<?php
namespace App\services\Validation;

class Validation
{
    public function validateIDNumber(string $id): bool
    {
        return (strlen($id) == 4 || strlen($id) == 5) && preg_match("/^[0-9-]+$/i", $id);
    }
    public function validateName(string $name):bool{
        return strlen($name)>=3&& !preg_match ("/^[a-zA-Z\s]+$/",$name)==false;
    }

    public function validateFirstUpper(string $word):string{
        return ucwords(strtolower($word));
    }
}
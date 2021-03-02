<?php

class Dog
{
    public string $name;
    public string $sex;
    public ?string $mother;
    public ?string $father;

    function __construct(string $name, string $sex, ?string $mother, ?string $father)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;

    }
}

class DogTest
{

    private array $allDogs = [];
    private array $compare = [];


    public function addDog(Dog $dog): void
    {
        $this->allDogs[] = $dog;
    }

    public function addManyDogs(array $dogs): void
    {
        foreach ($dogs as $dog) {
            $this->addDog($dog);
        }
    }

    public function getFathersName(string $searchDogName): string
    {
        foreach ($this->allDogs as $array => $object) {
            if ($object->name == $searchDogName) {
                return $object->father;
            } elseif ($object->name === $searchDogName || $object->father === NULL) {
                return 'Unknown';
            }
        }
    }

    public function hasSameMother(string $dog1, string $dog2): bool
    {
        foreach ($this->allDogs as $array => $object) {
            if ($object->name == $dog1) {
                array_push($this->compare, $object->mother);
            } elseif ($object->name == $dog2) {
                array_push($this->compare, $object->mother);
            }
        }

        if ($this->compare[0] === $this->compare[1]) {
            return true;
        } else {
            return false;
        }

    }

}

$dogs = new DogTest();

$dogs->addManyDogs([
    new Dog('Max', 'male', 'Lady', 'Rocky'),
    new Dog('Rocky', 'male', 'Molly', 'Sam'),
    new Dog('Sparky', 'male', null, null),
    new Dog('Buster', 'male', 'Lady', 'Sparky'),
    new Dog('Sam', 'male', null, null),
    new Dog('Lady', 'female', null, null),
    new Dog('Molly', 'female', null, null),
    new Dog('Coco', 'female', 'Lady', 'Sparky')
]);

echo $dogs->getFathersName('Rocky') . PHP_EOL;

echo $dogs->hasSameMother('Coco', 'Max') . PHP_EOL;



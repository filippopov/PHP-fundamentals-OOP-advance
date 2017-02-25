<?php
abstract class Animal
{
    private $name;
    private $birthday;

    public function __construct($name, $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }
}

class Citizen extends Animal
{
    private $name;

    private $age;

    private $id;

    public function __construct($name, $age, $id, $birthday)
    {
        parent::__construct($name, $birthday);
        $this->id = $id;
        $this->age = $age;
    }
}

class Pet extends Animal
{
    public function __construct($name, $birthday)
    {
        parent::__construct($name, $birthday);
    }
}

class BirthdayData
{
    /** @var Animal[] $allAnimals*/
    private $allAnimals = [];

    private $creatureWithBirthday = [];

    public function setAnimal(Animal $animal)
    {
        $this->allAnimals[] = $animal;
    }

    public function getAnimalWithBirthday($birthdayYear)
    {

        foreach ($this->allAnimals as $animal) {
            $animalBirthday = $animal->getBirthday();
            $animalBirthdayArray = explode('/', $animalBirthday);
            $year = $animalBirthdayArray[2];

            if ($year == $birthdayYear) {
                $this->creatureWithBirthday[] = $animalBirthday;
            }

        }

        for ($i = 0; $i < count($this->creatureWithBirthday); $i++) {
            echo $this->creatureWithBirthday[$i];

            if ($i < (count($this->creatureWithBirthday) - 1)) {
                echo PHP_EOL;
            }
        }
    }
}


$creature = trim(fgets(STDIN));
$birthdayData = new BirthdayData();

while ($creature != 'End') {
    $creatureArray = explode(' ', $creature);

    $type = $creatureArray[0];

    switch ($type) {
        case 'Citizen' : {
            $name = $creatureArray[1];
            $age = $creatureArray[2];
            $id = $creatureArray[3];
            $birthday = $creatureArray[4];
            $citizen = new Citizen($name, $age, $id, $birthday);
            $birthdayData->setAnimal($citizen);
            break;
        }
        case 'Pet' : {
            $name = $creatureArray[1];
            $birthday = $creatureArray[2];
            $pet = new Pet($name, $birthday);
            $birthdayData->setAnimal($pet);
            break;
        }
    }

    $creature = trim(fgets(STDIN));

}

$birthday = trim(fgets(STDIN));

$birthdayData->getAnimalWithBirthday($birthday);
?>
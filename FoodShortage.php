<?php
abstract class Human
{
    private $name;
    private $age;
    protected $food;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public abstract function BuyFood();

    public function getFood()
    {
        return $this->food;
    }
}

interface Buyer
{
    public function BuyFood();
}

class Citizen extends Human implements Buyer
{
    private $id;

    private $birthday;

    public function __construct($name, $age, $id, $birthday)
    {
        parent::__construct($name, $age);
        $this->id = $id;
        $this->birthday = $birthday;
        $this->food = 0;
    }

    public function BuyFood()
    {
        $this->food += 10;
    }
}

class Rebel extends Human implements Buyer
{
    private $group;

    public function __construct($name, $age, $group)
    {
        parent::__construct($name, $age);
        $this->group = $group;
        $this->food = 0;
    }

    public function BuyFood()
    {
       $this->food += 5;
    }
}

class FoodShortage
{
    /** @var Human[] $humans */
    private $humans = [];

    private $allFood;

    public function setPeople(Human $human)
    {
        $this->humans[] = $human;
    }

    public function getAllFood(array $allNames = [])
    {
        foreach ($allNames as $name) {
            foreach ($this->humans as $human) {
                if ($name == $human->getName()) {
                    $human->BuyFood();
                }
            }
        }

        foreach ($this->humans as $human) {
            $this->allFood += $human->getFood();
        }

        return $this->allFood;
    }
}

$humanCounter = intval(fgets(STDIN));
$foodStorage = new FoodShortage();

for ($i = 0; $i < $humanCounter; $i++) {
    $human = trim(fgets(STDIN));
    $humanArray = explode(' ', $human);
    $name = $humanArray[0];
    $age = $humanArray[1];
    if (count($humanArray) == 3) {
        $group = $humanArray[2];

        $rebel = new Rebel($name, $age, $group);
        $foodStorage->setPeople($rebel);
    } else {
        $id = $humanArray[2];
        $birthday = $humanArray[3];

        $citizen = new Citizen($name, $age, $id, $birthday);
        $foodStorage->setPeople($citizen);
    }
}

$humanNames = [];

$name = trim(fgets(STDIN));

while ($name != 'End') {
    $humanNames[] = $name;
    $name = trim(fgets(STDIN));
}

echo $foodStorage->getAllFood($humanNames);
?>
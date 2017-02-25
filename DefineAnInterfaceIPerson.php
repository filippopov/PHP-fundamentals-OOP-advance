<?php

interface IPerson
{
    public function getName();

    public function getAge();
}

class Citizen implements IPerson
{
    private $name;

    private $age;

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
}

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));

$citizen = new Citizen($name, $age);

echo $citizen->getName() . PHP_EOL;
echo $citizen->getAge();
?>
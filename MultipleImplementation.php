<?php

interface IPerson
{
    public function getName();

    public function getAge();
}

interface Identifiable
{
    public function getId();
}

interface Birthable
{
    public function getBirthdate ();
}

class Citizen implements IPerson, Identifiable, Birthable
{
    private $name;

    private $age;

    private $id;

    private $burthdate;

    public function __construct($name, $age, $id, $burthdate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->burthdate = $burthdate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBirthdate()
    {
        return $this->burthdate;
    }
}

$name = trim(fgets(STDIN));
$age = intval(fgets(STDIN));
$id = trim(fgets(STDIN));
$birthday = trim(fgets(STDIN));

$citizen = new Citizen($name, $age, $id, $birthday);

echo $citizen->getName() . PHP_EOL;
echo $citizen->getAge() . PHP_EOL;
echo $citizen->getId() . PHP_EOL;
echo $citizen->getBirthdate();
?>
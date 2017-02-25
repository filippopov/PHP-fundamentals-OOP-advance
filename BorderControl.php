<?php

abstract class Creature
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}

class Robot extends Creature
{
    private $model;

    public function __construct($model, $id)
    {
        parent::__construct($id);
        $this->model = $model;
    }
}

class Citizen extends Creature
{
    private $name;

    private $age;

    public function __construct($name, $age, $id)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->age = $age;
    }
}

class BorderControl
{
    /** @var Creature[] $allCreature*/
    private $allCreature = [];

    private $creatureWithFakeId = [];

    public function setAllCreature(Creature $creature)
    {
        $this->allCreature[] = $creature;
    }

    public function getCreatureWithFakeId($id)
    {
        $idLength = strlen($id);
        $lastNumber = '';

        foreach ($this->allCreature as $creature) {
            $creatureId = $creature->getId();
            if ($idLength > strlen($creatureId)) {
                continue;
            }

            for ($i = (strlen($creatureId) - 1); $i > (strlen($creatureId) - 1 - $idLength); $i--) {
                $lastNumber .= $creatureId[$i];
            }

            if (strrev($lastNumber) == $id) {
                $this->creatureWithFakeId[] = $creatureId;
            }
            $lastNumber = '';
        }

        for ($i = 0; $i < count($this->creatureWithFakeId); $i++) {
            echo $this->creatureWithFakeId[$i];

            if ($i < (count($this->creatureWithFakeId) - 1)) {
                echo PHP_EOL;
            }
        }
    }
}


$creature = trim(fgets(STDIN));
$borderControl = new BorderControl();

while ($creature != 'End') {
    $creatureArray = explode(' ', $creature);
    if (count($creatureArray) == 2) {
        $model = $creatureArray[0];
        $id = $creatureArray[1];

        $robot = new Robot($model, $id);

        $borderControl->setAllCreature($robot);

    } else {
        $name = $creatureArray[0];
        $age = $creatureArray[1];
        $id = $creatureArray[2];
        $citizen = new Citizen($name, $age, $id);

        $borderControl->setAllCreature($citizen);
    }

    $creature = trim(fgets(STDIN));

}

$id = trim(fgets(STDIN));

$borderControl->getCreatureWithFakeId($id);
?>
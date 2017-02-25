<?php

interface CarInterface
{
    public function useBrakes();

    public function useGasPedal();
}

class Ferrari implements CarInterface
{
    private $model = "488-Spider";

    private $driverName;

    public function __construct($driverName)
    {
        $this->driverName = $driverName;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getDriverName()
    {
        return $this->driverName;
    }

    public function useBrakes()
    {
        return "Brakes!";
    }

    public function useGasPedal()
    {
        return "Zadu6avam sA!";
    }

    public function __toString()
    {
        $result = "{$this->getModel()}/{$this->useBrakes()}/{$this->useGasPedal()}/{$this->getDriverName()}";

        return $result;
    }
}

$driverName = trim(fgets(STDIN));

$ferrari = new Ferrari($driverName);

echo $ferrari;
?>
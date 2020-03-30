<?php

abstract class Moto
{

    protected $engine_type, $weight, $tank, $maxSpeed, $model;
    private $color, $brand, $wheels;

    public function __construct($brand, $model, $color, $wheels, $weight, $tank, $maxSpeed)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->set_color($color);
        $this->set_wheels($wheels);
        $this->engine_type = "gasoline";
        $this->weight = $weight;
        $this->tank = $tank;
        $this->maxSpeed = $maxSpeed;


    }

    public function set_color($color)
    {
        $colors_available = ['red', 'yellow', 'blue', 'green', 'grey', 'black', 'white'];
        if (in_array($color, $colors_available)) {
            $this->color = $color;
            return true;
        } else {
            return false;
        }
    }

    public function set_wheels($wheels)
    {
        $wheels_available = [2, 3, 4];
        if (in_array($wheels, $wheels_available)) {
            $this->wheels = $wheels;
            return true;
        } else {
            return false;
        }
    }

    public function info()
    {
        return
            "This is " . (get_class($this)) . " " . $this->brand . " " . $this->model . ", " .
            "color is " . $this->color . ", " .
            "engine type is " . $this->engine_type . ", " .
            "weighs " . $this->weight . ' kilograms' . ". " .
            "It can reach a speed of " . $this->maxSpeed . " Km/h" . ", " .
            "tank volume " . $this->tank . ' liters' . ", " .
            "and it has " . $this->wheels . " wheels" . ". ";
    }
}


class Motorcycle extends Moto
{

}

class Scooter extends Moto
{

}

class ATV extends Moto
{

}

$YZF = new Motorcycle("Yamaha", "YZF R1", "blue", 2, 172,
    18, 300);
$NMAX = new Scooter("Yamaha", "NMAX", "black", 2,
    127, 6.6, 102);
$LINHAI = new ATV("Yamaha", "LINHAI", "white", 4, "356",
    14.2, 70);

$motoes = [$YZF, $NMAX, $LINHAI];

foreach ($motoes as $moto) {
    echo $moto->info() . "<br>";
}


?>
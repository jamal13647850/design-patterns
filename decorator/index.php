<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 2/18/2019
 * Time: 12:27 AM
 */

interface Car{
    public function cost();
    public function description();
}
class Pride implements Car {

    public function cost()
    {
        return 4000;
    }

    public function description()
    {
        return 'pride';
    }
}

abstract class CarFeature implements Car {
    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }
    abstract public function cost();
    abstract public function description();
}

class ZevareDar extends CarFeature {

    public function cost()
    {
        return $this->car->cost()+500;
    }

    public function description()
    {
        return $this->car->description() . ", ZevareDar";
    }
}
class SunRoof extends CarFeature {

    public function cost()
    {
        return $this->car->cost()+2300;
    }

    public function description()
    {
        return $this->car->description() . ", SunRoof";
    }
}

$pride = new Pride();
$prideWithZevareDar = new ZevareDar($pride);
$prideWithZevareDarAndSunRoof = new SunRoof($prideWithZevareDar);
echo $prideWithZevareDarAndSunRoof->cost();
echo $prideWithZevareDarAndSunRoof->description();
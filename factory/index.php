<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 2/19/2019
 * Time: 11:09 PM
 */

interface Transport{
    public function deliver($place);
}

class Truck implements Transport{

    public function deliver($place)
    {
        return $place;
    }
}
class Ship implements Transport{

    public function deliver($place)
    {
        return $place;
    }
}

abstract class Logistic{
    abstract public function createTransport();
    public function planDelivery($place){
        $transport = $this->createTransport();
        $transport->deliver($place);
        return $transport;
    }
}

class RoadLogistic extends Logistic{

    public function createTransport()
    {
        return new Truck();
    }
}

class SeaLogistic extends Logistic{

    public function createTransport()
    {
        return new Ship();
    }
}



$roadLogistic = new RoadLogistic();

//transport 1
$truck1 = $roadLogistic->planDelivery("Tehran");


//transport 2
$truck2 = $roadLogistic->planDelivery("Ardebil");


//transport 3
$truck3 = $roadLogistic->createTransport();
$truck3->deliver("Mazandaran");


$seaLogistic = new SeaLogistic();

//transport 4
$ship4 =$seaLogistic->planDelivery("America");


//transport 5
$ship5 = $seaLogistic->createTransport();
$ship5->deliver("Esfahan");

//transport 6
$ship6 = $seaLogistic->createTransport();
$ship6->deliver("Systan");

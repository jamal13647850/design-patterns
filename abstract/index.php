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

class TruckA implements Transport{

    public function deliver($place)
    {
        return $place;
    }

    public function someMethodA1(){
        return "someThing";
    }

    public function someMethodA2(){
        return "someThing";
    }
}

class TruckB implements Transport{

    public function deliver($place)
    {
        return $place;
    }

    public function someMethodB1(){
        return "someThing";
    }

    public function someMethodB2(){
        return "someThing";
    }
}
class ShipA implements Transport{

    public function deliver($place)
    {
        return $place;
    }
    public function someMethodA1(){
        return "someThing";
    }

    public function someMethodA2(){
        return "someThing";
    }
}
class ShipB implements Transport{

    public function deliver($place)
    {
        return $place;
    }

    public function someMethodB1(){
        return "someThing";
    }

    public function someMethodB2(){
        return "someThing";
    }
}

abstract class ATransportFactory{
    abstract public function createRoadTransport();
    abstract public function createSeaTransport();

}

class TransportFactoryA extends ATransportFactory{

    public function createRoadTransport()
    {
        return new TruckA();
    }

    public function createSeaTransport()
    {
        return new ShipB();
    }
}

class TransportFactoryB extends ATransportFactory{

    public function createRoadTransport()
    {
        return new TruckB();
    }

    public function createSeaTransport()
    {
        return new ShipA();
    }
}


$transport = new TransportFactoryA();
$transportB = new TransportFactoryB();

//transport 1
$truck1 = $transport->createRoadTransport();
$truck1 = $truck1->deliver("Tehran");

//transport 2
$truck2 = $transport->createRoadTransport();
$truck2 = $truck2->deliver("Shiraz");

//transport 3
$truck3 = $transport->createRoadTransport();
$truck3 = $truck3->deliver("Tehran");

//transport 4
$ship4= $transportB->createSeaTransport();
$ship4 = $ship4->deliver("America");
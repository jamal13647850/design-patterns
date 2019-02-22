<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 2/22/2019
 * Time: 9:11 AM
 */
interface CommandInterface{
    public function execute();
}

class CarDimpleWashCommand implements CommandInterface{

    protected $reciver;
    function __construct(CarInterFace $reciver)
    {
        $this->reciver = $reciver;
    }

    public function execute()
    {
        return '';
    }
}

class CarDryCommand implements CommandInterface {
    protected $reciver;
    function __construct(CarInterFace $reciver)
    {
        $this->reciver = $reciver;
    }
    public function execute()
    {
        // TODO: Implement execute() method.
    }
}

class CarWaxCommand implements CommandInterface {
    protected $reciver;
    function __construct(CarInterFace $reciver)
    {
        $this->reciver = $reciver;
    }
    public function execute()
    {
        // TODO: Implement execute() method.
    }
}

interface CarInterFace{

}

class PrideCar implements CarInterFace{

}
class CarWash{
    protected $CustomerList;
    public function newCustomer (array $TaskList){
        $this->CustomerList[] = $TaskList;
    }
    public function wash(){
        foreach ($this->CustomerList as $customer){
            foreach ($customer as $command){
                $command->execute();
            }
        }
    }
}


$car = new PrideCar();
$carWash = new CarWash();

$carWash->newCustomer([
    new CarDimpleWashCommand($car),
    new CarDryCommand($car),
    new CarWaxCommand($car)
    ]
);
$carWash->wash();
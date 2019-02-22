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

//------------------example 2-----------------------------
class Message{
    protected $queue=[];
    public function addMessage(IMessageSender $sender){
        $this->queue[] = $sender;
    }
    public function executeQueue(){
        foreach ($this->queue as $sender){
            $statusSendingMessage =false;

            while (!$statusSendingMessage){
                $statusSendingMessage = $sender->sendMessage();
            }
        }
    }
}
interface IMessageSender{
    public function sendMessage();
}
class sendEmail implements IMessageSender{
    protected $title,$message,$emailAddress;

    public function __construct($title, $message, $emailAddress)
    {
        $this->title = $title;
        $this->message = $message;
        $this->emailAddress = $emailAddress;
    }


    public function sendMessage()
    {
        //$status = Mail::send();
        //return $status;
    }
}

class sendSMS implements IMessageSender{
    protected $title,$message,$phoneNumber;

    public function __construct($title, $message, $phoneNumber)
    {
        $this->title = $title;
        $this->message = $message;
        $this->phoneNumber = $phoneNumber;
    }


    public function sendMessage()
    {
        //$status = api send sms
        //return $status;
    }
}

$messageQues = new Message();
$messageQues->addMessage(new sendEmail("jamaql","this is sayyed jamal ghasemi","jamal13647850@gmail.com"));
$messageQues->addMessage(new sendSMS("jamaql","this is sayyed jamal ghasemi","09124118355"));
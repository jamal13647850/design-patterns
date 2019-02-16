<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 2/16/2019
 * Time: 11:53 PM
 */

interface Gateway{
    public function setInfo($info);
    public function pay();
}

class Zarinpal implements Gateway {
    protected $info;

    public function setInfo($info){
        $this->info = $info;
    }

    public function pay()
    {
        return $this->info;
    }
}

class Mellat implements Gateway {
    protected $info;

    public function pay(){
        return $this->info;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }
}

class payment{
    protected $gateway;
    public function setGateway(Gateway $gateway){
        $this->gateway = $gateway;
    }

    public function addInfo($info){
        $this->gateway->setInfo($info);
    }

    public function pay(){
        return $this->gateway->pay();
    }
}

$payment = new payment();
$payment->setGateway(new Mellat());
$payment->addInfo(['name' => 'jamal' , 'price' => 1000]);
var_dump($payment->pay());
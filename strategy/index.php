<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 2/16/2019
 * Time: 11:53 PM
 */
class Zarinpal{
    protected $info;

    public function setInfo($info){
        $this->info = $info;
    }
    public function payment(){
        return $this->info;
    }
}

class Mellat{
    protected $info;

    public function addInfo($info){
        $this->info = $info;
    }
    public function pay(){
        return $this->info;
    }
}

class payment{
    protected $gateway;
    public function gateway($gateway){
        if($gateway == 'zarinpal'){
            $this->gateway = new Zarinpal();
        }
        elseif($gateway == 'mellat'){
            $this->gateway = new Mellat();
        }
    }

    public function addInfo($info){
        if($this->gateway instanceof Zarinpal){
            $this->gateway->setInfo($info);
        }
        elseif($this->gateway instanceof Mellat){
            $this->gateway->addInfo($info);
        }
    }

    public function pay(){
        if($this->gateway instanceof Zarinpal){
            return $this->gateway->payment();
        }
        elseif($this->gateway instanceof Mellat){
            return $this->gateway->pay();
        }
    }
}

$payment = new payment();
$payment->gateway('zarinpal');
$payment->addInfo(['name' => 'jamal' , 'price' => 1000]);
var_dump($payment->pay());
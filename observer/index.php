<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 2/17/2019
 * Time: 12:47 AM
 */
class Service implements iObserver{

    protected $name;
    protected $priority;

    function __construct($name,$priority = 0)
    {
        $this->name = $name;
        $this->priority = $priority;
    }

    public function update(iObservable $iObservable)
    {
        print_r("{$this->name}  : {$iObservable->getEvent()} <br>");
    }
}

class Publisher implements iObservable {
    protected $observers = [];
    protected  $event;

    public function setEvent($event){
        $this->event = $event;
        $this->notify();
    }
    public function getEvent(){
        return $this->event ;
    }

    /**
     * @return array
     */
    public function getObservers()
    {
        return $this->observers;
    }

    public function register(iObserver $Observer)
    {
        $observerKey = spl_object_hash($Observer);
        $this->observers[$observerKey] = $Observer;
    }

    public function unregister(iObserver $Observer)
    {
        $observerKey = spl_object_hash($Observer);
        unset($this->observers[$observerKey]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer){
            $observer->update($this);
        }
    }
}

interface  iObservable{
    public function register(iObserver $Observer);
    public function unregister(iObserver $Observer);
    public function notify();
}
interface  iObserver{
    public function update(iObservable $iObservable);
}

$notify = new Publisher();

$mail = new Service('Mailobserver',30);
$clock = new Service('Clockobserver',60);
$desktop = new Service('Desktopobserver',50);
$icons = new Service('Iconsobserver',20);

$notify->register($mail);
$notify->register($clock);
$notify->register($desktop);
$notify->register($icons);


$notify->setEvent("do somthings . . . ");

var_dump($notify->getObservers());

$notify->unregister($mail);
$notify->setEvent("somthings . . . else");
var_dump($notify->getObservers());
die;
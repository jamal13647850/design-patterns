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


interface  HtmlElement{
    public function toHTML();
    public function getName();
}

class InputText implements HtmlElement {

    protected $name;
    function __construct($name)
    {
        $this->name = $name;
    }

    public function toHTML()
    {
        return "<input type='text' name='".$this->name."' placeholder='فیلد را پر نمایید' id='".$this->name."'>";
    }

    public function getName()
    {
        return $this->name;
    }
}

abstract class HtmlDecorator implements HtmlElement{
    protected  $element;
    function __construct(HtmlElement $element)
    {
        $this->element = $element;
    }
    abstract public function toHTML();
    public function getName(){
        return $this->element->getName();
    }
}

class LabelDecorator extends HtmlDecorator{

    protected $label;
    public function setLabel($label){
        $this->label = $label;
    }

    public function toHTML()
    {
        return "<label for='".$this->getName()."'>$this->label</label>".$this->element->toHTML();
    }
}

$input = new InputText("firstName");
$lablled = new LabelDecorator($input);
$lablled->setLabel("first name: ");
echo $lablled->toHTML();
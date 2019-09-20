<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 3/5/2019
 * Time: 11:49 PM
 */
class Facebook {
    public function getUserToken($userData){
        //return token
    }

    public function postUpdate($token,$message)
    {
        
    }
}

$statusUpdate = new Facebook();

$token = $statusUpdate->getUserToken(['email'=>'jamal13647850','password'=>'123456']);
$statusUpdate->postUpdate($token,'some message');


class Twitter{
    public function checkUserToken($userData){
        //return token
        return '';
    }

    public function setStatusUpdate($token,$message)
    {
       return '';
    }
}




interface istatusUpdate{
    public function getUserToken($userData);
    public function postUpdate($token,$message);
}

class TwitterAdapter implements istatusUpdate{

    protected $twitter;

    /**
     * TwitterAdapter constructor.
     * @param $twitter
     */
    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }


    public function getUserToken($userData)
    {
        return $this->twitter->checkUserToken($userData);
    }

    public function postUpdate($token , $message)
    {
        return $this->twitter->setStatusUpdate($token , $message);
    }
}



$statusUpdate = new TwitterAdapter(new Twitter());

$token = $statusUpdate->getUserToken(['email'=>'jamal13647850','password'=>'123456']);
$statusUpdate->postUpdate($token,'some message');
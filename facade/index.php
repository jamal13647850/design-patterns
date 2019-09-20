<?php
/**
 * Created by PhpStorm.
 * User: Jamal
 * Date: 3/9/2019
 * Time: 11:10 PM
 */

class Validate{
    public function isValid($data)
    {
        return true;
    }
}

class User{
    public function create($data)
    {
        return true;
    }
}
class Mail{
    public function to($email_address)
    {
        return $this;
    }

    public function subject($subject)
    {
        return $this;
    }

    public function send()
    {
        return true;
    }
}

class Auth{
    public function login($email,$pass)
    {
        return true;
    }
}

class SignUpFacade{
    private $validate;
    private $user;
    private $auth;
    private $email;

    /**
     * SignUpFacade constructor.
     * @param $validate
     * @param $user
     * @param $auth
     * @param $email
     */
    public function __construct($validate, $user, $auth, $email)
    {
        $this->validate = $validate;
        $this->user = $user;
        $this->auth = $auth;
        $this->email = $email;
    }

    public function signUpUser($name,$email,$password)
    {
        $data = ['email'=>$email,'name'=>$name,'password'=>$password];
        if($this->validate->isValid($data)){
            $this->user->create($data);
            $this->auth->login($data['email'],$data['password']);
            $this->email->to($data['email']);
        }
    }

}






/*$validate = new Validate();
$user = new User();
$auth = new Auth();
$mail = new Mail();

$data = ['email'=>'jamal13647850@gmail.com','name'=>'jamal','password'=>"12345"];
if($validate->isValid($data)){
    $user->create($data);
    $auth->login($data['email'],$data['password']);
    $mail->to($data['email']);
}*/

$SignUpFacade=new SignUpFacade(new Validate(),new User(),new Auth(), new Mail());
$SignUpFacade->signUpUser('jamal','jamal13647850@gmail.com','12345');
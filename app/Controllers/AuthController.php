<?php
/**
 * Created by PhpStorm.
 * User: gyula
 * Date: 1/29/2019
 * Time: 8:08 PM
 */

namespace App\Controllers;

use Framework\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model("User");
        $this->user->newDbCon();
    }

    public function showUserLogin()
    {
        $this->user->find(["user" => $_SESSION['username']]);
        $this->view('auth/login.html', ["user" => $_SESSION['username'], "id" => 3, "btn" => '<a href="/auth/logout" class="btn btn-warning">Logout</a>']);
    }

    public function showLogin(){
        unset($_POST["password_verify"]);
        if($this->user->find($_POST) == false){
            $this->view('pages/message.html', ["text" => 'User or password does not exist <a href="/auth" class="btn btn-primary">Go to Auth</a>']);
        }
        else {
            $_SESSION['username'] = $_POST['user'];
            header("Location: /");
        }
    }

    public function showSignin()
    {
        if ($_POST["pass"] === $_POST["password_verify"])
        {
            unset($_POST["password_verify"]);
            $this->user->new($_POST);
        }
        else {
            $this->view('pages/message.html', ["text" => 'The password did not match <a href="/auth" class="btn btn-primary">Go to Auth</a>']);
        }
    }
}
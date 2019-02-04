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
    }

    public function showUserLogin()
    {
        $this->user->find(["user" => $_SESSION['username']]);
        $this->view('auth/login.html', ["user" => $_SESSION['username'], "id" => $_SESSION['user_id'], "btn" => '<a href="/auth/logout" class="btn btn-warning">Logout</a>']);
    }

    public function showLogin(){
        unset($_POST["password_verify"]);
        $_POST["pass"] = hash('ripemd160', $_POST["pass"]);
        $user_data = $this->user->find($_POST);
        if($user_data == false){
            $this->view('pages/message.html', ["text" => 'User or password does not exist <a href="/auth" class="btn btn-primary">Go to Auth</a>']);
        }
        else {
            $_SESSION['username'] = $user_data->user;
            $_SESSION['user_id'] = $user_data->id;

            // to do not resubmit data
            header('Location: /');
//            $_SERVER["router"] ->getResource("/");
        }
    }

    public function showSignin()
    {
        if ($_POST["pass"] === $_POST["password_verify"])
        {
            unset($_POST["password_verify"]);
            $_POST["pass"] = hash('ripemd160', $_POST["pass"]);
            $this->user->new($_POST);

            $this->view('pages/message.html', ["text" => 'Wellcome to our services <a href="/auth" class="btn btn-primary">Go to Auth</a>']);
        }
        else {
            $this->view('pages/message.html', ["text" => 'The password did not match <a href="/auth" class="btn btn-primary">Go to Auth</a>']);
        }
    }

    public function showLogout(){
        unset($_SESSION["username"]);
        $this->view('pages/message.html', ["text" => 'You have been logged out <a href="/page/home" class="btn btn-primary">Go to Home</a>']);
    }
}
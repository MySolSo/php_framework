<?php

namespace App\Controllers;

use Framework\Controller;
use App\Models\User;

/**
 * Class UserController
 */
class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model("User");
    }

    public function showUserAction($id)
    {
        $user = $this->user->find(["id" => $id]);
        if ($user == false) {
            $this->view('pages/message.html', ["text" => 'This user does not exist <a href="/page/home" class="btn btn-primary">Go to Home</a>']);
        } else {
            $this->view('user/show.html', ["user" => $user]);
        }
    }

    public function showEditAction($id)
    {
        $user = $this->user->find(["id" => $id]);
        if ($user == false) {
            $this->view('pages/message.html', ["text" => 'This user does not exist <a href="/page/home" class="btn btn-primary">Go to Home</a>']);
        } else {
            $this->view('user/edit.html', ["user" => $user]);
        }
    }

    public function doEditAction()
    {
        $user = $this->user->find(["id" => $_SESSION["user_id"]]);

        // check for valid email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->view('pages/message.html', ["text" => 'Not a valid email <a href="/user/edit/' . $_SESSION['user_id'] . '" class="btn btn-primary">Go to Home</a>']);
        }

        // check if user does exsist
        if ($user == false) {
            $this->view('pages/message.html', ["text" => 'Quite strange db error.. sry <a href="/page/home" class="btn btn-primary">Go to Home</a>']);
        } else {
            $pass_update = $_POST["pass"] != "" ? hash('ripemd160', $_POST['pass']) : $user->pass;
            $user_update = ['user' => $_POST["user"], 'email'=> $_POST["email"], 'pass' => $pass_update];
            $this->user->update(["id" => $_SESSION["user_id"]], $user_update);
            $this->view('pages/message.html', ["text" => 'Updated <a href="/page/home" class="btn btn-primary">Go to Home</a>']);
        }
    }

    public function showAllAction()
    {
        $this->view('user/all.html', []);
    }

    public function doRestUsers(){
        print $this->user->getDataForRest();
    }
}

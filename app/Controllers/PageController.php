<?php
namespace App\Controllers;

use Framework\Controller;

/**
 * Class PageController
 */
class PageController extends Controller
{
    public function aboutUsAction()
    {
        $this->view("pages/about-us.html");
    }

    public function showHomepage(){
        $this->view('pages/homepage.html', ["user" => $_SESSION['username'], "id" => 3, "btn" => '<a href="/auth/logout" class="btn btn-warning mt-1" style="width:10rem">Logout</a><br>']);
    }

    public function showMessage($text){
        return $this->view("pages/message.html", ["text" => $text]);
    }
}

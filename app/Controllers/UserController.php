<?php
namespace App\Controllers;

use Framework\Controller;
use App\Models\User;

/**
 * Class UserController
 */
class UserController extends Controller
{
    public function showUserAction($id)
    {
        dump($id);
        print($id);
        //$user = (new User)->get($id);

        //return $this->view('user/show.html', ["user" => $user]);
    }

    public function showEditAction($id){
        dump($id);
        print ("EDIT");
    }

    public function showAction(){
        print ('other' );
    }
}

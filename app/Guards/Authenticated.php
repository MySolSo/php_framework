<?php
namespace App\Guards;

use Framework\Guard;

class Authenticated implements Guard
{
    public function handle(array $params = null)
    {
        if (!isset($_SESSION['username']))
            $this->reject();
    }

    public function reject()
    {
        header("Location: /auth/login");
    }
}

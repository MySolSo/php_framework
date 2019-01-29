<?php
$routes = [
    '/page/about-us' => ['controller' => 'PageController', 'action' => 'aboutUsAction'],
    '/page/home' => ['controller' => 'PageController', 'action' => 'showHomepage'],
    '/page/msg/{text}' => ['controller' => 'PageController', 'action' => 'showMessage'],

    '/user/{id}' => ['controller' => 'UserController', 'action' => 'showUserAction'],
    '/user/edit/{id}' => ['controller' => 'UserController', 'action' => 'showEditAction', 'guard' => 'Authenticated'],

    '/auth' => ['controller' => 'AuthController', 'action' => 'showUserLogin'],
    '/auth/login' => ['controller' => 'AuthController', 'action' => 'showLogin'],
    '/auth/logout' => ['controller' => 'AuthController', 'action' => 'showLogout'],
    '/auth/signin' => ['controller' => 'AuthController', 'action' => 'showSignin'],
];

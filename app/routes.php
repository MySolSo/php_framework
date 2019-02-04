<?php
$routes = [
    '/page/about-us' => ['controller' => 'PageController', 'action' => 'aboutUsAction'],
    '/page/home' => ['controller' => 'PageController', 'action' => 'showHomepage'],
    '/page/msg/{text}' => ['controller' => 'PageController', 'action' => 'showMessage'],

    '/user' => ['controller' => 'UserController', 'action' => 'showAllAction'],
    '/user/doedit' => ['controller' => 'UserController', 'action' => 'doEditAction', 'guard' => 'Authenticated'],
    '/user/{id}' => ['controller' => 'UserController', 'action' => 'showUserAction', 'guard' => 'Authenticated'],
    '/user/edit/{id}' => ['controller' => 'UserController', 'action' => 'showEditAction', 'guard' => 'Authenticated'],

    // in case its ok to be public
    '/rest/users' => ['controller' => 'UserController', 'action' => 'doRestUsers'],

    '/auth' => ['controller' => 'AuthController', 'action' => 'showUserLogin'],
    '/auth/login' => ['controller' => 'AuthController', 'action' => 'showLogin'],
    '/auth/logout' => ['controller' => 'AuthController', 'action' => 'showLogout'],
    '/auth/signin' => ['controller' => 'AuthController', 'action' => 'showSignin'],
];

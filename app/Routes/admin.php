<?php

$routes->group('admin', function ($routes){
   
    $routes->get('logout', 'Backend\Login::logout', ['as' => 'admin_logout']);
    $routes->match(['get','post'],'login', 'Backend\Login::index', ['as' => 'admin_login']);
    $routes->get('register', 'Backend\Register::index', ['as' => 'admin_register']);
    $routes->post('register', 'Backend\Register::index', ['as' => 'admin_register']);
    $routes->match(['get','post'],'forgot-password', 'Backend\Forgot::index', ['as' => 'admin_forgot_password']);
    $routes->match(['get','post'],'reset-password', 'Backend\Forgot::resetPassword', ['as' => 'admin_reset_password']);
    $routes->get('permissions/failed', 'Backend\Permissions::error_page', ['as' => 'admin_permissions_error']);
    $routes->group('verification', function ($routes){
        $routes->get('account/(:segment)', 'Backend\Verification::account/$1', ['as' => 'admin_verification']);
        $routes->get('forgot-password/(:segment)', 'Backend\Verification::forgot/$1', ['as' => 'admin_forgot_verification']);
      
    });
    $routes->get('dashboard', 'Backend\Dashboard::index', ['as' => 'admin_dashboard']);
    
});




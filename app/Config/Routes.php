<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group("{locale}",function($routes){
    if(file_exists(APPPATH . 'Routes/admin.php')){
        require APPPATH . 'Routes/admin.php';
    }
    if(file_exists(APPPATH . 'Routes/api.php')){
        require APPPATH . 'Routes/api.php';
    }
    if(file_exists(APPPATH . 'Routes/web.php')){
        require APPPATH . 'Routes/web.php';
    }
});

if(file_exists(APPPATH . 'Routes/install.php')){
    require APPPATH . 'Routes/install.php';
}

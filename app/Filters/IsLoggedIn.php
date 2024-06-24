<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Settings;

class IsLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
       
        $settings = new Settings;
        $segment  = $request->getUri()->getSegments();
        
       // $isUriLocale = in_array($segment[0], $supportLocale);
       
        $isStopUri = in_array($segment[1], $settings->stopAuthFilter );
       

        if($segment[0] == 'admin' && !$isStopUri && !session()->isLogin){
           
            return redirect()->to(route_to('admin_login'));
        }


        if ( $segment[0] == 'admin' && $isStopUri && session()->isLogin){
            return redirect()->to(route_to('admin_dashboard'));
        }

       
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        echo "after";
    }
}
<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Settings;

class IsPermissions implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $segment  = $request->getUri()->getSegments();
        print_r($segment);
        if(session()->isLogin && isset($segment[0])){
            $segment[1]=isset($segment[1])?"_".$segment[1]:"";
            $permit=$segment[0].$segment[1];
            print_r($permit);

        }
       
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        echo "after";
    }
}
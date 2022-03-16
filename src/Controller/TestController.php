<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    public function index() 
    {
        dd("okok");
    }


    /**
     * @Route("/test/{age<\d+>?0}", name="test" methods={"GET", "POST"}, schemes={"http", "https"})
     */
    public function test(Request $request, $age) 
    {
        dump($request);
        // $age = $request->attributes->get('age');

        return new Response("Vous avez $age ans !");

        
    }
}

<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerudoController
{

    /**
     * @Route("/", name="perudo-home", methods={"GET"})
     */
    public function index(): Response
    {
        return new Response(
            '<html><body><h1>Perudo mon bon yoan</h1></body></html>'
        );
    }
}

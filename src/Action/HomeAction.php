<?php

namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeAction
{
    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $user = $this->em->getRepository('App\Entity\User')->findOneBy(['id' => 1]);

        return $response->write($user->getName() . ' ' . $user->getEmail());
    }
}

<?php

namespace App\Presentation\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FrontController extends AbstractController
{
    #[Route(
        path: '/{vueRouting}',
        name: 'front_controller',
        requirements: ['vueRouting' => '^(?!api).*$'],
        defaults: ['vueRouting' => ''])
    ]
    public function __invoke(): Response
    {
        return $this->render('index.html.twig');
    }
}
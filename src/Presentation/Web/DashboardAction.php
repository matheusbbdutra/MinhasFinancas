<?php

namespace App\Presentation\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardAction extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function __invoke(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }
}
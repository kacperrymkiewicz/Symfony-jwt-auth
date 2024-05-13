<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
  * @Route("/api", name="api_")
  */
class PanelController extends AbstractController
{
    #[Route('/api/panel', name: 'app_panel')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PanelController.php',
        ]);
    }
}

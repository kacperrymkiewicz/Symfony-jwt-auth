<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TokenController extends AbstractController
{
    #[Route('/api/token', name: 'app_token')]
    public function viewToken(JWTTokenManagerInterface $jwtManager, TokenStorageInterface $tokenStorage): JsonResponse
    {
        // Pobierz token z nagłówka żądania
        $token = $tokenStorage->getToken();

        // Sprawdź czy token jest poprawny
        if (!$token) {
            return new JsonResponse(['message' => 'Token not found'], 401);
        }

        // Pobierz zawartość tokena
        $tokenContent = $jwtManager->decode($token);

        return $this->json(['token' => $tokenContent]);
    }
}
<?php

namespace App\Controller;

use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        // Récupérer les erreurs d'authentification si l'utilisateur a échoué à se connecter
        $error = $authenticationUtils->getLastAuthenticationError();

        $form = $this->createForm(LoginFormType::class);

        return $this->render('security/index.html.twig', [
            'form' => $form->createView(),
            'error' => $error,
        ]);
    }
}
<?php

namespace App\Controller;

use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    #[Route('/', name: 'app_login')]
    public function login(Request $request): Response
    {
        $form = $this->createForm(LoginFormType::class);
        $form->handleRequest($request); 

     
        if ($form->isSubmitted()) {
            return $this->redirectToRoute('app_message');
        }

        return $this->render('security/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
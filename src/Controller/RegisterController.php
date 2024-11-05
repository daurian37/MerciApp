<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\UserType;

class RegisterController extends AbstractController
{
        #[Route('/register', name: 'app_register')]
        public function register(Request $request, EntityManagerInterface $em): Response
        {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                $passwordHash = password_hash($user->getPassword(), PASSWORD_BCRYPT);
                $user->setPassword($passwordHash);
                $em->persist($user);
                $em->flush();

            return $this->redirectToRoute('app_message'); 
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
        }

}
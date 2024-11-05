<?php

namespace App\Controller;

use App\Repository\MessageRepository;
use App\Entity\Message;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function index(MessageRepository $messageRepository): Response
    {
        $messages = $messageRepository->findAll();
        
        return $this->render('message/index.html.twig', [
            'messages' => $messages,
        ]);
    }
    
    #[Route('/message/create', name: 'create_message')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $message->setCreatedAt(new \DateTime());
            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('app_message');
        }

        return $this->render('message/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
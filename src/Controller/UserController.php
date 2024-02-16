<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignInType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{

    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }


    #[Route('/signin', name: 'app_signin')]
    public function signIn(Request $request, UserRepository $userRepository, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
        $error = "";
        $user = new User();
        $form = $this->createForm(SignInType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $isAlreadyExisting = !($userRepository->find($user->getUserIdentifier()) === null);
            if ($user->getId() === null && !$isAlreadyExisting) {
                $user->setRoles(['ROLE_USER']);
                $hashedPassword = $passwordHasher->hashPassword(
                    $user,
                    $user->getPassword(),
                );
                $user->setPassword($hashedPassword);
                $em->persist($user);
                $em->flush();
                return $this->redirectToRoute('app_login');
            } else {
                $error = "Un utilisateur existe déjà avec cette email";
            }

        }
        return $this->render('signIn/index.html.twig', [
            'form' => $form,
            'error' => $error,
        ]);
    }
}

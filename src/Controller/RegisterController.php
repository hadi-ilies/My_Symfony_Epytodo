<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Form\UserType;

class RegisterController extends Controller
{

    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request, ObjectManager $manager)
    {
      $register = new User();
      $form = $this->createForm(UserType::class, $register);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $manager->persist($register);
          $manager->flush();  
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

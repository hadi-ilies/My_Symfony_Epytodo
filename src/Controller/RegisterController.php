<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Form\UserType;

class RegisterController extends Controller
{

    /**
     * @Route("/register", name="register")
     */

    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
      $register = new User();
      $form = $this->createFormBuilder($register)
            ->add('username')
            ->add('password', PasswordType::class)
            ->add('mail')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $hash = $encoder->encodePassword($register, $register->getPassword());
          $register->setPassword($hash);
          $manager->persist($register);
          $manager->flush();  

          return ($this->redirectToRoute('login'));
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/login", name="login")
     */
    
     public function login()
    {
            return ($this->render('login/login.html.twig'));
    }

    /**
     * @Route("/logout", name="logout")
     */

    public function logout() {}
}

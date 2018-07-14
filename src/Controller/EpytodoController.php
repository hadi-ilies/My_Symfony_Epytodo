<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Form;
use App\Form\TaskType;
use App\Entity\Task;
use App\Entity\Article;

class EpytodoController extends Controller
{

    /**
    * @Route("/home", name="home")
    */

    public function home()
    { 
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $Article = $repo->findAll();

        return $this->render('epytodo/index.html.twig', [
            'Article' => $Article
        ]);
    }
    

  /**
  * @Route("/register/epytodo", name="epytodo")
  */

    public function epytodo(Request $Request, ObjectManager $manager)
    {
        $task = new Task();
        $form = $this->createFormBuilder($task)
                ->add('title')
                ->add('begin', DateType::class)    
                ->add('end', DateType::class)
                ->add('status', TextType::class)
                ->getForm();

        $form->handleRequest($Request);

        dump($task);
        if ($form->isSubmitted() && $form->isValid()) {
                        $manager->persist($task);
                        $manager->flush();
                        return $this->redirectToRoute('home');
                }


    return $this->render('epytodo/epytodo.html.twig', [
      'form' => $form->createView(),
    ]);
    }

}

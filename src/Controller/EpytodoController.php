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

    public function epytodo(Request $request, ObjectManager $manager, \Swift_Mailer $mailer)
    {        
        $task = new Task();
        
        $form = $this->createFormBuilder($task)
            ->add('begin')
            ->add('end')
            ->add('status')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
                    $manager->persist($task);
                    $manager->flush();
                    $mail = (new \Swift_Message('Your Task'))
                            ->setFrom('darksiders218@gmail.com')
                            ->setTo('hadi-ilies.bereksi-reguig@epitech.eu') //take email register
                            ->setBody(
                                $this->renderView('email/task_note.html.twig', array(
                                     'task' => $task) 
                                )
                            );
                    $mailer->send($mail);
                    return $this->redirectToRoute('tasks');
                }                        
    return $this->render('epytodo/epytodo.html.twig', [
      'form' => $form->createView(),
    ]);
    }

    /**
     * @Route("/register/epytodo/task", name="tasks")
     */

    public function all_task()
    {
        $repo = $this->getDoctrine()->getRepository(Task::class);
        $tasks = $repo->findAll();

        return ($this->render('all_task/display_all_task.html.twig', [
            'tasks' => $tasks
        ]));
    }

}

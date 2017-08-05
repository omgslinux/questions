<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Entity\Tag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * Task controller.
 *
 * @Route("task")
 */
class TaskController extends Controller
{
    /**
     * Lists all question entities.
     *
     * @Route("/", name="task_index")
     * @Method("GET")
     */
    public function newAction(Request $request)
    {
        $task = $this->getDoctrine()->getManager()->getRepository('AppBundle:Task')->findOneBy(['id'=>1]);

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        // end dummy code

        $form = $this->createForm('AppBundle\Form\TaskType', $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('task/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

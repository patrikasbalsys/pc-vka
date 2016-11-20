<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Processor;
use AppBundle\Form\ProcessorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class ProcessorController extends Controller
{
    /**
     * @Route("/pc/newProcessor", name="processor_new")
     */
    public function newAction(Request $request)
    {
        $processor = new Processor();

        $form = $this->createForm(ProcessorType::class, $processor);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($processor);
            $em->flush();

            return $this->redirectToRoute('pc_list', array());
        }

        return $this->render('pc/newProcessor.html.twig', array(
            'form' => $form->createView(),
            'quote' => 'Create a new Processor',
            'subQuote' => 'Create a new entity:',

        ));

    }

    /**
     * @Route("/deleteProcessor/{processor}", name="delete_processor")
     */
    public function  deleteAction(Request $request, Processor $processor)
    {

        $form = $this->createFormBuilder($processor)
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($processor);
            $em->flush();

            return $this->redirectToRoute('pc_list');
        }

        // Default return
        return $this->render('pc/deleteProcessor.html.twig', [
            'processor' => $processor,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/pc/editProcessor/{processor}", name="processor_edit")
     */
    public function editAction(Request $request, Processor $processor)
    {

        // Create our form
        $form = $this->createForm(ProcessorType::class, $processor);


        // Handling a form
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('pc_list');
        }

        // Default return
        return $this->render('pc/newProcessor.html.twig', [
            'processor' => $processor,
            'form' => $form->createView(),
            'quote' => 'Edit a Processor',
            'subQuote' => 'Edit an entity:',
        ]);

    }
}

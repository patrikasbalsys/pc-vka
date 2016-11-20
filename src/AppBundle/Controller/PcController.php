<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pc;
use AppBundle\Form\PcType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PcController extends Controller
{
    /**
     * @Route("/pc/new", name="pc_new")
     */
    public function newAction(Request $request)
    {
        $pc = new Pc();

        $form = $this->createForm(PcType::class, $pc);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pc);
            $em->flush();

            return $this->redirectToRoute('pc_list', array());
        }

        return $this->render('pc/new.html.twig', array(
            'form' => $form->createView(),
            'quote' => 'Create a new PC',
            'subQuote' => 'Create a new entity:',
        ));

    }

    /**
     * @Route("/pc", name="pc_list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pcs = $em->getRepository('AppBundle:Pc')
            ->findAll();

        $processors = $em->getRepository('AppBundle:Processor')
            ->findAll();

        $graphicsCards = $em->getRepository('AppBundle:GraphicsCard')
            ->findAll();

        return $this->render('pc/list.html.twig', array(
            'pcs' => $pcs,
            'processors' => $processors,
            'graphicsCards' => $graphicsCards,
        ));
    }

    /**
     * @Route("/delete/{pc}", name="delete_pc")
     */
    public function  deleteAction(Request $request, Pc $pc)
    {

        $form = $this->createFormBuilder($pc)
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pc);
            $em->flush();

            return $this->redirectToRoute('pc_list');
        }

        // Default return
        return $this->render('pc/delete.html.twig', [
            'pc' => $pc,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/pc/edit/{pc}", name="pc_edit")
     */
    public function editAction(Request $request, Pc $pc)
    {

        // Create our form
        $form = $this->createForm(PcType::class, $pc);


        // Handling a form
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('pc_list');
        }

        // Default return
        return $this->render('pc/new.html.twig', [
            'pc' => $pc,
            'form' => $form->createView(),
            'quote' => 'Edit a PC',
            'subQuote' => 'Edit an entity:',
        ]);

    }
}

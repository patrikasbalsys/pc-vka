<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GraphicsCard;
use AppBundle\Form\GraphicsCardType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class GraphicsCardController extends Controller
{
    /**
     * @Route("/pc/newGraphicsCard", name="graphicsCard_new")
     */
    public function newAction(Request $request)
    {
        $graphicsCard = new GraphicsCard();

        $form = $this->createForm(GraphicsCardType::class, $graphicsCard);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($graphicsCard);
            $em->flush();

            return $this->redirectToRoute('pc_list', array());
        }

        return $this->render('pc/newGraphicsCard.html.twig', array(
            'form' => $form->createView(),
            'quote' => 'Create a new Graphics Card',
            'subQuote' => 'Create a new entity:',
        ));

    }

    /**
     * @Route("/deleteGraphicsCard/{graphicsCard}", name="delete_graphicsCard")
     */
    public function  deleteAction(Request $request, GraphicsCard $graphicsCard)
    {

        $form = $this->createFormBuilder($graphicsCard)
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($graphicsCard);
            $em->flush();

            return $this->redirectToRoute('pc_list');
        }

        // Default return
        return $this->render('pc/deleteGraphicsCard.html.twig', [
            'graphicsCard' => $graphicsCard,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/pc/editGraphicsCard/{graphicsCard}", name="graphicsCard_edit")
     */
    public function editAction(Request $request, GraphicsCard $graphicsCard)
    {

        // Create our form
        $form = $this->createForm(GraphicsCardType::class, $graphicsCard);


        // Handling a form
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('pc_list');
        }

        // Default return
        return $this->render('pc/newGraphicsCard.html.twig', [
            'graphicsCard' => $graphicsCard,
            'form' => $form->createView(),
            'quote' => 'Edit a Graphics Card',
            'subQuote' => 'Edit an entity:',
        ]);

    }
}

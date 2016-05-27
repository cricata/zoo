<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\FoodItem;
use AppBundle\Form\FoodItemType;

/**
 * FoodItem controller.
 *
 */
class FoodItemController extends Controller
{
    /**
     * Lists all FoodItem entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $foodItems = $em->getRepository('AppBundle:FoodItem')->findAll();

        return $this->render('fooditem/index.html.twig', array(
            'foodItems' => $foodItems,
        ));
    }

    /**
     * Creates a new FoodItem entity.
     *
     */
    public function newAction(Request $request)
    {
        $foodItem = new FoodItem();
        $form = $this->createForm('AppBundle\Form\FoodItemType', $foodItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foodItem);
            $em->flush();

            return $this->redirectToRoute('fooditem_show', array('id' => $foodItem->getId()));
        }

        return $this->render('fooditem/new.html.twig', array(
            'foodItem' => $foodItem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FoodItem entity.
     *
     */
    public function showAction(FoodItem $foodItem)
    {
        $deleteForm = $this->createDeleteForm($foodItem);

        return $this->render('fooditem/show.html.twig', array(
            'foodItem' => $foodItem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FoodItem entity.
     *
     */
    public function editAction(Request $request, FoodItem $foodItem)
    {
        $deleteForm = $this->createDeleteForm($foodItem);
        $editForm = $this->createForm('AppBundle\Form\FoodItemType', $foodItem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foodItem);
            $em->flush();

            return $this->redirectToRoute('fooditem_edit', array('id' => $foodItem->getId()));
        }

        return $this->render('fooditem/edit.html.twig', array(
            'foodItem' => $foodItem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FoodItem entity.
     *
     */
    public function deleteAction(Request $request, FoodItem $foodItem)
    {
        $form = $this->createDeleteForm($foodItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($foodItem);
            $em->flush();
        }

        return $this->redirectToRoute('fooditem_index');
    }

    /**
     * Creates a form to delete a FoodItem entity.
     *
     * @param FoodItem $foodItem The FoodItem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FoodItem $foodItem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fooditem_delete', array('id' => $foodItem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

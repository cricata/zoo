<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\FoodCategory;
use AppBundle\Form\FoodCategoryType;

/**
 * FoodCategory controller.
 *
 */
class FoodCategoryController extends Controller
{
    /**
     * Lists all FoodCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $foodCategories = $em->getRepository('AppBundle:FoodCategory')->findAll();

        return $this->render('foodcategory/index.html.twig', array(
            'foodCategories' => $foodCategories,
        ));
    }

    /**
     * Creates a new FoodCategory entity.
     *
     */
    public function newAction(Request $request)
    {
        $foodCategory = new FoodCategory();
        $form = $this->createForm('AppBundle\Form\FoodCategoryType', $foodCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foodCategory);
            $em->flush();

            return $this->redirectToRoute('foodcategory_show', array('id' => $foodCategory->getId()));
        }

        return $this->render('foodcategory/new.html.twig', array(
            'foodCategory' => $foodCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FoodCategory entity.
     *
     */
    public function showAction(FoodCategory $foodCategory)
    {
        $deleteForm = $this->createDeleteForm($foodCategory);

        return $this->render('foodcategory/show.html.twig', array(
            'foodCategory' => $foodCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FoodCategory entity.
     *
     */
    public function editAction(Request $request, FoodCategory $foodCategory)
    {
        $deleteForm = $this->createDeleteForm($foodCategory);
        $editForm = $this->createForm('AppBundle\Form\FoodCategoryType', $foodCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foodCategory);
            $em->flush();

            return $this->redirectToRoute('foodcategory_edit', array('id' => $foodCategory->getId()));
        }

        return $this->render('foodcategory/edit.html.twig', array(
            'foodCategory' => $foodCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FoodCategory entity.
     *
     */
    public function deleteAction(Request $request, FoodCategory $foodCategory)
    {
        $form = $this->createDeleteForm($foodCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($foodCategory);
            $em->flush();
        }

        return $this->redirectToRoute('foodcategory_index');
    }

    /**
     * Creates a form to delete a FoodCategory entity.
     *
     * @param FoodCategory $foodCategory The FoodCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FoodCategory $foodCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('foodcategory_delete', array('id' => $foodCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

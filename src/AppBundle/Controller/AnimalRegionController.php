<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\AnimalRegion;
use AppBundle\Form\AnimalRegionType;

/**
 * AnimalRegion controller.
 *
 */
class AnimalRegionController extends Controller
{
    /**
     * Lists all AnimalRegion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $animalRegions = $em->getRepository('AppBundle:AnimalRegion')->findAll();

        return $this->render('animalregion/index.html.twig', array(
            'animalRegions' => $animalRegions,
        ));
    }

    /**
     * Creates a new AnimalRegion entity.
     *
     */
    public function newAction(Request $request)
    {
        $animalRegion = new AnimalRegion();
        $form = $this->createForm('AppBundle\Form\AnimalRegionType', $animalRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animalRegion);
            $em->flush();

            return $this->redirectToRoute('animalregion_show', array('id' => $animalRegion->getId()));
        }

        return $this->render('animalregion/new.html.twig', array(
            'animalRegion' => $animalRegion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AnimalRegion entity.
     *
     */
    public function showAction(AnimalRegion $animalRegion)
    {
        $deleteForm = $this->createDeleteForm($animalRegion);

        return $this->render('animalregion/show.html.twig', array(
            'animalRegion' => $animalRegion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AnimalRegion entity.
     *
     */
    public function editAction(Request $request, AnimalRegion $animalRegion)
    {
        $deleteForm = $this->createDeleteForm($animalRegion);
        $editForm = $this->createForm('AppBundle\Form\AnimalRegionType', $animalRegion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animalRegion);
            $em->flush();

            return $this->redirectToRoute('animalregion_edit', array('id' => $animalRegion->getId()));
        }

        return $this->render('animalregion/edit.html.twig', array(
            'animalRegion' => $animalRegion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AnimalRegion entity.
     *
     */
    public function deleteAction(Request $request, AnimalRegion $animalRegion)
    {
        $form = $this->createDeleteForm($animalRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($animalRegion);
            $em->flush();
        }

        return $this->redirectToRoute('animalregion_index');
    }

    /**
     * Creates a form to delete a AnimalRegion entity.
     *
     * @param AnimalRegion $animalRegion The AnimalRegion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnimalRegion $animalRegion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animalregion_delete', array('id' => $animalRegion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

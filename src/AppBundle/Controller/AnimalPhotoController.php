<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\AnimalPhoto;
use AppBundle\Form\AnimalPhotoType;

/**
 * AnimalPhoto controller.
 *
 */
class AnimalPhotoController extends Controller
{
    /**
     * Lists all AnimalPhoto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $animalPhotos = $em->getRepository('AppBundle:AnimalPhoto')->findAll();

        return $this->render('animalphoto/index.html.twig', array(
            'animalPhotos' => $animalPhotos,
        ));
    }

    /**
     * Creates a new AnimalPhoto entity.
     *
     */
    public function newAction(Request $request)
    {
        $animalPhoto = new AnimalPhoto();
        $form = $this->createForm('AppBundle\Form\AnimalPhotoType', $animalPhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animalPhoto);
            $em->flush();

            return $this->redirectToRoute('animalphoto_show', array('id' => $animalPhoto->getId()));
        }

        return $this->render('animalphoto/new.html.twig', array(
            'animalPhoto' => $animalPhoto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AnimalPhoto entity.
     *
     */
    public function showAction(AnimalPhoto $animalPhoto)
    {
        $deleteForm = $this->createDeleteForm($animalPhoto);

        return $this->render('animalphoto/show.html.twig', array(
            'animalPhoto' => $animalPhoto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AnimalPhoto entity.
     *
     */
    public function editAction(Request $request, AnimalPhoto $animalPhoto)
    {
        $deleteForm = $this->createDeleteForm($animalPhoto);
        $editForm = $this->createForm('AppBundle\Form\AnimalPhotoType', $animalPhoto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animalPhoto);
            $em->flush();

            return $this->redirectToRoute('animalphoto_edit', array('id' => $animalPhoto->getId()));
        }

        return $this->render('animalphoto/edit.html.twig', array(
            'animalPhoto' => $animalPhoto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AnimalPhoto entity.
     *
     */
    public function deleteAction(Request $request, AnimalPhoto $animalPhoto)
    {
        $form = $this->createDeleteForm($animalPhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($animalPhoto);
            $em->flush();
        }

        return $this->redirectToRoute('animalphoto_index');
    }

    /**
     * Creates a form to delete a AnimalPhoto entity.
     *
     * @param AnimalPhoto $animalPhoto The AnimalPhoto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnimalPhoto $animalPhoto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animalphoto_delete', array('id' => $animalPhoto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

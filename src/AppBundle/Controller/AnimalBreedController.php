<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\AnimalBreed;
use AppBundle\Form\AnimalBreedType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * AnimalBreed controller.
 *
 */
class AnimalBreedController extends Controller
{

    /**
     * Lists all AnimalBreed entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mapping = $this->getDoctrine()->getManager()->getClassMetadata('AppBundle:AnimalBreed');
        $columns = $mapping->getFieldNames();

        $animalBreeds = $em->getRepository('AppBundle:AnimalBreed')->findAll();

        return $this->render('animalbreed/index.html.twig', array(
            'animalBreeds' => $animalBreeds,
            'columns'   => $columns,
        ));
    }

    /**
     * Creates a new AnimalBreed entity.
     *
     */
    public function newAction(Request $request)
    {
        $animalBreed = new AnimalBreed();
        $form = $this->createForm('AppBundle\Form\AnimalBreedType', $animalBreed);
        /* Adaug aici butonul de submit */
        $form->add('submit', SubmitType::class, array(
            'label'=>'Create',
            'attr'=>array(
                'class'=>'btn btn-primary'
            ),
            'translation_domain'=>'AppBundle',
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animalBreed);
            $em->flush();

            return $this->redirectToRoute('animalbreed_show', array('id' => $animalBreed->getId()));
        }

        return $this->render('animalbreed/new.html.twig', array(
            'animalBreed' => $animalBreed,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AnimalBreed entity.
     *
     */
    public function showAction(AnimalBreed $animalBreed)
    {
        $deleteForm = $this->createDeleteForm($animalBreed);

        return $this->render('animalbreed/show.html.twig', array(
            'animalBreed' => $animalBreed,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AnimalBreed entity.
     *
     */
    public function editAction(Request $request, AnimalBreed $animalBreed)
    {
        $deleteForm = $this->createDeleteForm($animalBreed);
        $editForm = $this->createForm('AppBundle\Form\AnimalBreedType', $animalBreed);
        /* Adaug aici butonul de submit */
        $editForm->add('submit', SubmitType::class, [
            'label'=>'Save',
            'attr'=>[
                'class'=>'btn btn-success'
            ],
            'translation_domain'=>'AppBundle',
        ]);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animalBreed);
            $em->flush();

            return $this->redirectToRoute('animalbreed_show', array('id' => $animalBreed->getId()));
        }

        return $this->render('animalbreed/edit.html.twig', array(
            'animalBreed' => $animalBreed,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AnimalBreed entity.
     *
     */
    public function deleteAction(Request $request, AnimalBreed $animalBreed)
    {
        $form = $this->createDeleteForm($animalBreed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($animalBreed);
            $em->flush();
        }

        return $this->redirectToRoute('animalbreed_index');
    }

    /**
     * Creates a form to delete a AnimalBreed entity.
     *
     * @param AnimalBreed $animalBreed The AnimalBreed entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnimalBreed $animalBreed)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animalbreed_delete', array('id' => $animalBreed->getId())))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, [
                'label'=>'Delete',
                'attr'=>[
                    'class'=>'btn btn-danger'
                ],
                'translation_domain'=>'AppBundle'
            ])
            ->getForm()
        ;
    }
}

<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Animal;
use AppBundle\Form\AnimalType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Animal controller.
 *
 */
class AnimalController extends Controller
{

    /**
     * Lists all Animal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mapping = $this->getDoctrine()->getManager()->getClassMetadata('AppBundle:Animal');
        $columns = $mapping->getFieldNames();

        $animals = $em->getRepository('AppBundle:Animal')->findAll();

        return $this->render('animal/index.html.twig', array(
            'animals' => $animals,
            'columns'   => $columns,
        ));
    }

    /**
     * Creates a new Animal entity.
     *
     */
    public function newAction(Request $request)
    {
        $animal = new Animal();
        $form = $this->createForm('AppBundle\Form\AnimalType', $animal);
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
            $em->persist($animal);
            $em->flush();

            return $this->redirectToRoute('animal_show', array('id' => $animal->getId()));
        }

        return $this->render('animal/new.html.twig', array(
            'animal' => $animal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Animal entity.
     *
     */
    public function showAction(Animal $animal)
    {
        $deleteForm = $this->createDeleteForm($animal);

        return $this->render('animal/show.html.twig', array(
            'animal' => $animal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Animal entity.
     *
     */
    public function editAction(Request $request, Animal $animal)
    {
        $deleteForm = $this->createDeleteForm($animal);
        $editForm = $this->createForm('AppBundle\Form\AnimalType', $animal);
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
            $em->persist($animal);
            $em->flush();

            return $this->redirectToRoute('animal_show', array('id' => $animal->getId()));
        }

        return $this->render('animal/edit.html.twig', array(
            'animal' => $animal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Animal entity.
     *
     */
    public function deleteAction(Request $request, Animal $animal)
    {
        $form = $this->createDeleteForm($animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($animal);
            $em->flush();
        }

        return $this->redirectToRoute('animal_index');
    }

    /**
     * Creates a form to delete a Animal entity.
     *
     * @param Animal $animal The Animal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Animal $animal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animal_delete', array('id' => $animal->getId())))
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

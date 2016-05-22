<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\AnimalHabitat;
use AppBundle\Form\AnimalHabitatType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * AnimalHabitat controller.
 *
 */
class AnimalHabitatController extends Controller
{

    /**
     * Lists all AnimalHabitat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mapping = $this->getDoctrine()->getManager()->getClassMetadata('AppBundle:AnimalHabitat');
        $columns = $mapping->getFieldNames();

        $animalHabitats = $em->getRepository('AppBundle:AnimalHabitat')->findAll();

        return $this->render('animalhabitat/index.html.twig', array(
            'animalHabitats' => $animalHabitats,
            'columns'   => $columns,
        ));
    }

    /**
     * Creates a new AnimalHabitat entity.
     *
     */
    public function newAction(Request $request)
    {
        $animalHabitat = new AnimalHabitat();
        $form = $this->createForm('AppBundle\Form\AnimalHabitatType', $animalHabitat);
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
            $em->persist($animalHabitat);
            $em->flush();

            return $this->redirectToRoute('animalhabitat_show', array('id' => $animalHabitat->getId()));
        }

        return $this->render('animalhabitat/new.html.twig', array(
            'animal' => $animalHabitat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AnimalHabitat entity.
     *
     */
    public function showAction(AnimalHabitat $animalHabitat)
    {
        $deleteForm = $this->createDeleteForm($animalHabitat);

        return $this->render('animalhabitat/show.html.twig', array(
            'animal' => $animalHabitat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AnimalHabitat entity.
     *
     */
    public function editAction(Request $request, AnimalHabitat $animalHabitat)
    {
        $deleteForm = $this->createDeleteForm($animalHabitat);
        $editForm = $this->createForm('AppBundle\Form\AnimalHabitatType', $animalHabitat);
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
            $em->persist($animalHabitat);
            $em->flush();

            return $this->redirectToRoute('animalhabitat_show', array('id' => $animalHabitat->getId()));
        }

        return $this->render('animalhabitat/edit.html.twig', array(
            'animal' => $animalHabitat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AnimalHabitat entity.
     *
     */
    public function deleteAction(Request $request, AnimalHabitat $animalHabitat)
    {
        $form = $this->createDeleteForm($animalHabitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($animalHabitat);
            $em->flush();
        }

        return $this->redirectToRoute('animalhabitat_index');
    }

    /**
     * Creates a form to delete a AnimalHabitat entity.
     *
     * @param AnimalHabitat $animalHabitat The AnimalHabitat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnimalHabitat $animalHabitat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animalhabitat_delete', array('id' => $animalHabitat->getId())))
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

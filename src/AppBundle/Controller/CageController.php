<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Cage;
use AppBundle\Form\CageType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Cage controller.
 *
 */
class CageController extends Controller
{

    /**
     * Lists all Cage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mapping = $this->getDoctrine()->getManager()->getClassMetadata('AppBundle:Cage');
        $columns = $mapping->getFieldNames();

        $cages = $em->getRepository('AppBundle:Cage')->findAll();

        return $this->render('cage/index.html.twig', array(
            'cages' => $cages,
            'columns'   => $columns,
        ));
    }

    /**
     * Creates a new Cage entity.
     *
     */
    public function newAction(Request $request)
    {
        $cage = new Cage();
        $form = $this->createForm('AppBundle\Form\CageType', $cage);
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
            $em->persist($cage);
            $em->flush();

            return $this->redirectToRoute('cage_show', array('id' => $cage->getId()));
        }

        return $this->render('cage/new.html.twig', array(
            'cage' => $cage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cage entity.
     *
     */
    public function showAction(Cage $cage)
    {
        $deleteForm = $this->createDeleteForm($cage);

        return $this->render('cage/show.html.twig', array(
            'cage' => $cage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cage entity.
     *
     */
    public function editAction(Request $request, Cage $cage)
    {
        $deleteForm = $this->createDeleteForm($cage);
        $editForm = $this->createForm('AppBundle\Form\CageType', $cage);
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
            $em->persist($cage);
            $em->flush();

            return $this->redirectToRoute('cage_show', array('id' => $cage->getId()));
        }

        return $this->render('cage/edit.html.twig', array(
            'cage' => $cage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cage entity.
     *
     */
    public function deleteAction(Request $request, Cage $cage)
    {
        $form = $this->createDeleteForm($cage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cage);
            $em->flush();
        }

        return $this->redirectToRoute('cage_index');
    }

    /**
     * Creates a form to delete a Cage entity.
     *
     * @param Cage $cage The Cage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cage $cage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cage_delete', array('id' => $cage->getId())))
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

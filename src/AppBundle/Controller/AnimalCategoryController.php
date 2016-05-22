<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\AnimalCategory;
use AppBundle\Form\AnimalCategoryType;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * AnimalCategory controller.
 *
 */
class AnimalCategoryController extends Controller
{

    /**
     * Lists all AnimalCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $mapping = $this->getDoctrine()->getManager()->getClassMetadata('AppBundle:AnimalCategory');
        $columns = $mapping->getFieldNames();

        $animalCategories = $em->getRepository('AppBundle:AnimalCategory')->findAll();

        return $this->render('animalcategory/index.html.twig', array(
            'animalCategories' => $animalCategories,
            'columns'   => $columns,
        ));
    }

    /**
     * Creates a new AnimalCategory entity.
     *
     */
    public function newAction(Request $request)
    {
        $animalCategory = new AnimalCategory();
        $form = $this->createForm('AppBundle\Form\AnimalCategoryType', $animalCategory);
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
            $em->persist($animalCategory);
            $em->flush();

            return $this->redirectToRoute('animalbreed_show', array('id' => $animalCategory->getId()));
        }

        return $this->render('animalcategory/new.html.twig', array(
            'animalCategory' => $animalCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AnimalCategory entity.
     *
     */
    public function showAction(AnimalCategory $animalCategory)
    {
        $deleteForm = $this->createDeleteForm($animalCategory);

        return $this->render('animalcategory/show.html.twig', array(
            'animalCategory' => $animalCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AnimalCategory entity.
     *
     */
    public function editAction(Request $request, AnimalCategory $animalCategory)
    {
        $deleteForm = $this->createDeleteForm($animalCategory);
        $editForm = $this->createForm('AppBundle\Form\AnimalCategoryType', $animalCategory);
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
            $em->persist($animalCategory);
            $em->flush();

            return $this->redirectToRoute('animalbreed_show', array('id' => $animalCategory->getId()));
        }

        return $this->render('animalcategory/edit.html.twig', array(
            'animalCategory' => $animalCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AnimalCategory entity.
     *
     */
    public function deleteAction(Request $request, AnimalCategory $animalCategory)
    {
        $form = $this->createDeleteForm($animalCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($animalCategory);
            $em->flush();
        }

        return $this->redirectToRoute('animalbreed_index');
    }

    /**
     * Creates a form to delete a AnimalCategory entity.
     *
     * @param AnimalCategory $animalCategory The AnimalCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnimalCategory $animalCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('animalbreed_delete', array('id' => $animalCategory->getId())))
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

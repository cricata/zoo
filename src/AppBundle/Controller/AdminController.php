<?php

namespace AppBundle\Controller;


use AppBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('admin/index.html.twig', array(
            'users' => $users,

        ));
    }



    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('admin/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editAction(Request $request, User $user)
    {        
        $em = $this->getDoctrine()->getManager();
        
        $rol = $em ->getRepository('AppBundle:Role')->findAll(); 
        $roles = $user->getRoles();
        $selRoles =array();

        
    }

    public function deleteAction(Request $request, User $user){

        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('admin');
    }


}

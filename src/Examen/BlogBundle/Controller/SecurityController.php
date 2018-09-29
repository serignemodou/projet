<?php

namespace Examen\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Examen\BlogBundle\Form\UsersType;
use Examen\BlogBundle\Entity\Users;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;




class SecurityController extends Controller
{
     
    public function accountAction(Request $request )

    {
        
    $users= new Users();
 
    $form = $this->createForm(UsersType::class, $users);
   
    $form->handleRequest($request);
   if($form->isSubmitted() && $form->isValid()){
     
       $em=$this->getDoctrine()->getManager();
       
       $em->persist($users);

       $em->flush();

       return $this->redirectToRoute('examen_blog_login');
   }


    $formview =$form->createView();
    
        return $this->render('@ExamenBlog/Page/account.html.twig',array(
            'form'=>$formview
        ));
    }

public function loginAction()
{

    return $this->render('@ExamenBlog/Page/login.html.twig');
}

}
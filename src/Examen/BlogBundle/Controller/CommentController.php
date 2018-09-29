<?php

namespace Examen\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Examen\BlogBundle\Form\UsersType;
use Examen\BlogBundle\Form\ArticlesType;
use Examen\BlogBundle\Form\CategoryType;
use Examen\BlogBundle\Form\CommentaireType;
use Examen\BlogBundle\Entity\Users;
use Examen\BlogBundle\Entity\Articles;
use Examen\BlogBundle\Entity\Category;
use Examen\BlogBundle\Entity\Commentaire;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;




class CommentController extends Controller
{
          
    public function commentAction(Request $request)
    {
        //creer un users

    $comment= new Commentaire();

    // on recupere le formulaire

    $form = $this->createForm(CommentaireType::class, $comment);
   
    $form->handleRequest($request);
    
    //si le formulaire a ete soumis

   if($form->isSubmitted() && $form->isValid()){

       // on enregistre le formulaire en bdd

       $em=$this->getDoctrine()->getManager();
       
       $em->persist($comment);

       $em->flush();

       return new Response(' commentaire poste');
   }


    $formview =$form->createView();
    
        return $this->render('@ExamenBlog/Page/comment.html.twig',array(
            'form'=>$formview
        ));
    }
}
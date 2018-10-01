<?php

namespace Examen\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Examen\BlogBundle\Form\CategoryType;
use Examen\BlogBundle\Entity\Category;





class CategoriController extends Controller
{
    public function categoryAction(Request $request){

        $category=new Category();

        $form=$this->createForm(CategoryType::class, $category);
        
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){

            // on enregistre le formulaire en bdd
     
            $em=$this->getDoctrine()->getManager();
            
            $em->persist($category);
     
            $em->flush();
     
            return new Response(' category enregistré');
        }
     
     
         $formview =$form->createView();
         
             return $this->render('@ExamenBlog/Page/category.html.twig',array(
                 'form'=>$formview
             ));
         }
  


         public function categoryListAction()
          {
     
        $categorys=$this
        
        ->getDoctrine()

        ->getRepository('ExamenBlogBundle:Category')

        ->findAll();
       
        return $this->render('@ExamenBlog/Page/categoryList.html.twig', array(
            'categorys'=>$categorys
        ));

    }
}
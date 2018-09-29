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




class ArticleController extends Controller
{
    public function ArticlesAction(Request $request)
    {
        $articles =new Articles();

        $form_article=$this->createForm(ArticlesType::class, $articles);

        

        $form_article->handleRequest($request);

        // si le formulaire est soumis

        if($form_article->isSubmitted() && $form_article->isValid()){

            /**
             * @var UploadedFile $file
             */
            $file=$articles->getImage();

            $fileName=md5(uniqid()).'.'.$file->guessExtension();

            $file->move($this->getParameter('image_directory'),  $fileName); 

            $articles->setImage($fileName);

            // on enregistre le formulaire en bdd
     
            $em=$this->getDoctrine()->getManager();
            
            $em->persist($articles);
     
            $em->flush();
     
          
            return $this->redirectToRoute('examen_blog_articlespage');
            
        }

        $form_articleview=$form_article->createView();

        return $this->render('@ExamenBlog/Page/articles.html.twig', array(
            'form_article'=>$form_articleview
        ));
    }



   public function articlesListAction()
    {
     
        $article=$this  ->getDoctrine()  ->getRepository('ExamenBlogBundle:Articles')  ->findAll(); 
        return $this->render('@ExamenBlog/Page/articlesList.html.twig', array(
            'article'=>$article,

        ));

    }
  
    
    public function showarticleAction( Request $request, Articles $articles, $id )

    {
        $comment= new Commentaire();
        $form =$this->createForm(CommentaireType::class, $comment);
        $form->handleRequest($request);
        $em=$this->getDoctrine()->getManager();
        $articles=$em ->getRepository('ExamenBlogBundle:Articles')  ->find($id); 
        if($form->isSubmitted() && $form->isValid()){
            $comment->setArticles($articles);
            $em->persist($comment);
            $em->flush();
            return $this->redirectToRoute('examen_blog_showarticle', array(
                'id'=>$articles->getId()
            ));
        }
         return $this->render('@ExamenBlog/Page/showarticle.html.twig', array(
           
            'articles'=>$articles,
           'comment1' =>$form->createView(),
        
        ));

    }
  
}
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





class LayaoutController extends Controller
{
    
    public function LayaoutAction()
    {
    return $this->render('@ExamenBlog/Page/layaout.html.twig');
    }
    
}
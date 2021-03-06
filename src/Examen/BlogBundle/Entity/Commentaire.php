<?php

namespace Examen\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="Examen\BlogBundle\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    
    /**
     * @var string
     *
     * @ORM\Column(name="author", type="text")
     */
    private $author;

     /**
     * @var Articles
     *
     * 
     * 
     * @Assert\Type(type="Examen\BlogBundle\Entity\Articles")
     * @ORM\ManyToOne(targetEntity="Articles", inversedBy="comment",
       cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Commentaire
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

     /**
     * Set article
     *
     * @param \Examen\BlogBundle\Entity\Articles  $article
     *
     * @return Commentaire
     */
    public function setArticle(\Examen\BlogBundle\Entity\Articles $article)
    
    {
        $this->article = $article;

        return $this;
    }

 

   



    /**
     * Set author
     *
     * @param string $author
     *
     * @return Commentaire
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get article
     *
     * @return \Examen\BlogBundle\Entity\Articles
     */
    public function getArticle()
    {
        return $this->article;
    }
}

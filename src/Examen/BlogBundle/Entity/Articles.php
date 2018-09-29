<?php

namespace Examen\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use  ExamenBlogBundle\Entity\Category;

/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="Examen\BlogBundle\Repository\ArticlesRepository")
 */
class Articles
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
     * @ORM\Column(name="titre", type="text")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var Category
     *
     * @Assert\Valid()
     * @Assert\Type(type="Examen\BlogBundle\Entity\Category")
     * @ORM\ManyToOne(targetEntity="Category",
       cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $categorie;

    

    /**
     * @var string
     * 
     * @Assert\Image()
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Articles
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Articles
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Articles
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param \Examen\BlogBundle\Entity\Category  $categorie
     *
     * @return Articles
     */
    public function setCategorie(\Examen\BlogBundle\Entity\Category $categorie)
    
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Examen\BlogBundle\Entity\Category
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

 

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Articles
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}


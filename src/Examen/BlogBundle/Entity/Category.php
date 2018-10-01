<?php

namespace Examen\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Examen\BlogBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="categori", type="string", length=255)
     * 
     * @Assert\NotBlank(message="champ categorie Obligatoire");
     * 
     * 
     */
    public $categori;


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
     * Set categori
     *
     * @param string $categori
     *
     * @return Category
     */
    public function setCategori($categori)
    {
        $this->categori = $categori;

        return $this;
    }

    /**
     * Get categori
     *
     * @return string
     */
    public function getCategori()
    {
        return $this->categori;
    }
}

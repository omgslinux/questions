<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Answer;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $text;

    /**
     * @var Rol
     *
     * @ORM\ManyToOne(targetEntity="Rol", inversedBy="users")
     */
    private $rol;


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
     * Set text
     *
     * @param string $text
     *
     * @return Question
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Add rol
     *
     * @param Rol $rol
     *
     * @return User
     */
    public function setRol(Rol $rol)
    {
        $this->rol=$rol;

        return $this;
    }

    /**
     * Get roles
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }


    public function __toString()
    {
        return $this->getText();
    }

}

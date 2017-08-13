<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Answer;
use UserBundle\Entity\Traits\RolEntityTrait;
use UserBundle\Entity\Traits\ActivableEntityTrait;
use UserBundle\Entity\Traits\UserInterfaceEntityTrait;
use UserBundle\Entity\Traits\SecurityEntityTrait;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User
{
    Use ActivableEntityTrait, SecurityEntityTrait, RolEntityTrait, UserInterfaceEntityTrait;
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
     * @var Domain
     *
     * @ORM\ManyToOne(targetEntity="Domain", inversedBy="users")
     */
    private $domain;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_list", type="boolean")
     */
    private $list=false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_admin", type="boolean")
     */
    private $admin=false;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Alias", mappedBy="name")
     */
    private $aliases;


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
     * Add domain
     *
     * @param Domain $domain
     *
     * @return User
     */
    public function setDomain(Domain $domain)
    {
        $this->domain=$domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set admin
     *
     * @param boolean $bool
     *
     * @return User
     */
    public function setAdmin($bool)
    {
        $this->admin=$bool;

        return $this;
    }

    /**
     * Is Admin
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * Set list
     *
     * @param boolean $bool
     *
     * @return User
     */
    public function setList($bool)
    {
        $this->list=$bool;

        return $this;
    }

    /**
     * Is list
     *
     * @return boolean
     */
    public function isList()
    {
        return $this->list;
    }


    public function __toString()
    {
        return $this->getText();
    }

}

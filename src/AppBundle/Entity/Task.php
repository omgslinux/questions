<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity
 */
class Task
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
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="task", cascade={"persist"})
     */
    private $tags;


    public function __construct()
    {
        $this->tags=new ArrayCollection();
    }

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
     * @return Task
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
     * Add tag
     *
     * @param Tag $tag
     *
     * @return Task
     */
    public function addTag(Tag $tag)
    {
        $this->tags->add($tag);
        $tag->setTask($this);

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Remove tag
     *
     * @param Tag $tag
     *
     * @return Task
     */
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    public function __toString()
    {
        return $this->getText();
    }

}

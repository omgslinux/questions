<?php

namespace AppBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait ActivableEntityTrait {

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active=false;

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    public function isActive()
    {
        return $this->active;
    }

}

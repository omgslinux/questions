<?php

namespace UserBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\Rol;

trait RolEntityTrait {

    /**
     * @var Rol
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Rol", inversedBy="users")
     */
    private $rol;

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

    public function getRol()
    {
        $rol=$this->getRoles();
        if (is_array($rol)) {
          return $this->getRoles()[0];
        } else {
          return $this->rol;
        }
    }


    /**
     * Get rol
     *
     * @return string
     */
/*    public function getRol()
    {
        return $this->rol;
    }
*/
}

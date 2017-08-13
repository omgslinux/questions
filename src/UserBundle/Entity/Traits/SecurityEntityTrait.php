<?php

namespace UserBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Entity\Rol;

trait SecurityEntityTrait {

    /**
     * @var ArrayCollection
     *
     */
    private $securities=array();

    /**
     * Get securities
     *
     * @return ArrayCollection
     */
    public function getSecurities()
    {
        return $this->securities;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

  /**
   * Set password
   *
   * @param string $password
   *
   * @return users
   */
  public function setPassword($password)
  {
      $this->password = $password;

      return $this;
  }

  /**
   * Get password
   *
   * @return string
   */
  public function getPassword()
  {
      return $this->password;
  }

}

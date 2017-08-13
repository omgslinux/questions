<?php

namespace UserBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait UserInterfaceEntityTrait
{

    /**
     * @var string
     *
     */
    private $username;

    public function getUsername()
    {
        return $this->getEmail();
    }


  public function getRoles()
  {
      if ($this->getDomain()->getId() === 0) {
          return ['ROLE_ADMIN'];
      } elseif ($this->isAdmin()) {
          return ['ROLE_MANAGER'];
      } elseif ($this->getId()) {
          return ['ROLE_USER'];
      } else {
          return [];
      }
  }

  public function eraseCredentials()
  {

  }

  public function getSalt()
  {
      return null;
  }

  public function serialize()
  {
      return serialize(array(
        $this->id,
        $this->user,
        $this->password,
        $this->active
      ));
  }

  public function unserialize($serialized)
  {
      list(
        $this->id,
        $this->user,
        $this->password,
        $this->active,
      ) = userialize($serialized);
  }


}

<?php

namespace UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * ManagePassword
 *
 */
class Security
{

    /**
     * @var string
     *
     */
    private $_username;

    /**
     * @var string
     *
     */
    private $_password;

    /**
     * @var string
     *
     */
    private $plainPassword;

    /**
     * Set plainpassword
     *
     * @param string $plainpassword
     *
     * @return users
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;

        return $this;
    }

    /**
     * Get plainpassword
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Get _username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * Get _password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }


}

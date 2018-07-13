<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
    * @ORM\Column(type="string", length=255)
    */

    private $username;

    /**
    * @ORM\Column(type="string", length=128)
    */
    private $password;

    function getUsername() {
      return $this->username;
    }

    function setUsername($username) {
      $this->username = $username;
    }

    function getPassword() {
      return $this->password;
    }

    function setPassword($password) {
      $this->password = $password;
    }
}

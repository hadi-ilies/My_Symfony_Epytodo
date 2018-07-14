<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
    * @Assert\Length(min="8", minMessage="votre mot de passe doit faire minimum 8 caractères")
    */
    private $password;

    /*
    ** @ORM\Column(type="string", length=255)
    */
    private $mail;

    function getMail() {
      return $this->mail;
    }

    function setMail($mail) {
      $this->mail = $mail;
    }

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

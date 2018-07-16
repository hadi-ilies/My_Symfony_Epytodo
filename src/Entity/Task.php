<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
    * @ORM\Column(type="datetime")
    */
    private $begin;

    /**
    * @ORM\Column(type="datetime")
    */
    private $end;

    /** 
    * @ORM\Column(type="text")
    */
    private $status;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
    }

    public function getBegin()
    {
      return $this->begin;
    }

    public function setBegin($begin)
    {
      $this->begin = $begin;
    }

    public function getEnd()
    {
      return $this->end;
    }

    public function setEnd($end)
    {
      $this->end = $end;
    }

    public function getStatus()
    {
      return $this->status;
    }

    public function setStatus($status)
    {
      $this->status = $status;
    }
}

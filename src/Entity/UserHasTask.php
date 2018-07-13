<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserHasTaskRepository")
 */
class UserHasTask
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $fk_user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $fk_task_id;

    public function getId()
    {
        return $this->id;
    }

    public function getFkUserId(): ?int
    {
        return $this->fk_user_id;
    }

    public function setFkUserId(int $fk_user_id): self
    {
        $this->fk_user_id = $fk_user_id;

        return $this;
    }

    public function getFkTaskId(): ?int
    {
        return $this->fk_task_id;
    }

    public function setFkTaskId(int $fk_task_id): self
    {
        $this->fk_task_id = $fk_task_id;

        return $this;
    }
}

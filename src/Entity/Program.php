<?php

namespace App\Entity;

use App\Repository\ProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProgramRepository::class)
 */
class Program
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_users;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $room_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=SignUp::class, mappedBy="session")
     */
    private $signUps;

    public function __construct()
    {
        $this->signUps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getMaxUsers(): ?int
    {
        return $this->max_users;
    }

    public function setMaxUsers(int $max_users): self
    {
        $this->max_users = $max_users;

        return $this;
    }

    public function getRoomName(): ?string
    {
        return $this->room_name;
    }

    public function setRoomName(string $room_name): self
    {
        $this->room_name = $room_name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|SignUp[]
     */
    public function getSignUps(): Collection
    {
        return $this->signUps;
    }

    public function addSignUp(SignUp $signUp): self
    {
        if (!$this->signUps->contains($signUp)) {
            $this->signUps[] = $signUp;
            $signUp->addSession($this);
        }

        return $this;
    }

    public function removeSignUp(SignUp $signUp): self
    {
        if ($this->signUps->removeElement($signUp)) {
            $signUp->removeSession($this);
        }

        return $this;
    }
}

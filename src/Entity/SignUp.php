<?php

namespace App\Entity;

use App\Repository\SignUpRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SignUpRepository::class)
 */
class SignUp
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cnp;

    /**
     * @ORM\ManyToMany(targetEntity=program::class, inversedBy="signUps")
     */
    private $session;

    public function __construct()
    {
        $this->session = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCnp(): ?string
    {
        return $this->cnp;
    }

    public function setCnp(?string $cnp): self
    {
        $this->cnp = $cnp;

        return $this;
    }

    /**
     * @return Collection|program[]
     */
    public function getSession(): Collection
    {
        return $this->session;
    }

    public function addSession(program $session): self
    {
        if (!$this->session->contains($session)) {
            $this->session[] = $session;
        }

        return $this;
    }

    public function removeSession(program $session): self
    {
        $this->session->removeElement($session);

        return $this;
    }
}
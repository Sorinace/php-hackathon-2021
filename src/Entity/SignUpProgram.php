<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SignUpProgramRepository::class)
 */
class SignUpProgram
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $sing_up_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $program_id;


    public function getSingUpId(): ?int
    {
        return $this->sing_up_id;
    }

    public function getProgramId(): ?int
    {
        return $this->program_id;
    }
}
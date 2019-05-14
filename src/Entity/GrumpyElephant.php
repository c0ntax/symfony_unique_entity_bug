<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GrumpyElephantRepository")
 * @UniqueEntity(fields={"code"})
 */
class GrumpyElephant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TinyPuppy", inversedBy="grumpyElephants", fetch="EAGER")
     */
    private $tinyPuppy;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return GrumpyElephant
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getTinyPuppy(): ?TinyPuppy
    {
        return $this->tinyPuppy;
    }

    public function setTinyPuppy(?TinyPuppy $tinyPuppy): self
    {
        $this->tinyPuppy = $tinyPuppy;

        return $this;
    }
}

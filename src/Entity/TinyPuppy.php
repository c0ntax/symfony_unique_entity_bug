<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TinyPuppyRepository")
 */
class TinyPuppy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GrumpyElephant", mappedBy="tinyPuppy")
     */
    private $grumpyElephants;

    public function __construct()
    {
        $this->grumpyElephants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|GrumpyElephant[]
     */
    public function getGrumpyElephants(): Collection
    {
        return $this->grumpyElephants;
    }

    public function addGrumpyElephant(GrumpyElephant $grumpyElephant): self
    {
        if (!$this->grumpyElephants->contains($grumpyElephant)) {
            $this->grumpyElephants[] = $grumpyElephant;
            $grumpyElephant->setTinyPuppy($this);
        }

        return $this;
    }

    public function removeGrumpyElephant(GrumpyElephant $grumpyElephant): self
    {
        if ($this->grumpyElephants->contains($grumpyElephant)) {
            $this->grumpyElephants->removeElement($grumpyElephant);
            // set the owning side to null (unless already changed)
            if ($grumpyElephant->getTinyPuppy() === $this) {
                $grumpyElephant->setTinyPuppy(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CatRepository")
 */
class Cat
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
    private $imya;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poroda;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cvet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $harakter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImya(): ?string
    {
        return $this->imya;
    }

    public function setImya(string $imya): self
    {
        $this->imya = $imya;

        return $this;
    }

    public function getPoroda(): ?string
    {
        return $this->poroda;
    }

    public function setPoroda(string $poroda): self
    {
        $this->poroda = $poroda;

        return $this;
    }

    public function getCvet(): ?string
    {
        return $this->cvet;
    }

    public function setCvet(string $cvet): self
    {
        $this->cvet = $cvet;

        return $this;
    }

    public function getHarakter(): ?string
    {
        return $this->harakter;
    }

    public function setHarakter(string $harakter): self
    {
        $this->harakter = $harakter;

        return $this;
    }
}

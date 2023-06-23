<?php

namespace App\Entity;

use App\Repository\PaintRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaintRepository::class)]
class Paint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $paintName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $paintImage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $inspiration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageInspiration = null;

    #[ORM\Column(length: 150)]
    private ?string $taille = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaintName(): ?string
    {
        return $this->paintName;
    }

    public function setPaintName(string $paintName): static
    {
        $this->paintName = $paintName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPaintImage(): ?string
    {
        return $this->paintImage;
    }

    public function setPaintImage(string $paintImage): static
    {
        $this->paintImage = $paintImage;

        return $this;
    }

    public function getInspiration(): ?string
    {
        return $this->inspiration;
    }

    public function setInspiration(?string $inspiration): static
    {
        $this->inspiration = $inspiration;

        return $this;
    }

    public function getImageInspiration(): ?string
    {
        return $this->imageInspiration;
    }

    public function setImageInspiration(?string $imageInspiration): static
    {
        $this->imageInspiration = $imageInspiration;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }
}

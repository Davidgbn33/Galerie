<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $categoryName = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $categoryImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(?string $categoryName): static
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function getCategoryImage(): ?string
    {
        return $this->categoryImage;
    }

    public function setCategoryImage(?string $categoryImage): static
    {
        $this->categoryImage = $categoryImage;

        return $this;
    }
}

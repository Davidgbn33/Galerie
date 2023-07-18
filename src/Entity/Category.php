<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Veuillez saisir une catégorie')]
    private ?string $categoryName = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $categoryImage = null;

     #[Assert\Regex(
        pattern: '/^[\w\s\.,!?@#$%^&*()-=_+[\]{}|\\;:\'"<>/]+$/i',
        message: 'Veuillez saisir une image avec des caractère valide'
    )]
    private ?string $categoryFile = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Paint::class)]
    private Collection $paints;

    public function __construct()
    {
        $this->paints = new ArrayCollection();
    }

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

    /**
     * @return string|null
     */
    public function getCategoryImage(): ?string
    {
        return $this->categoryImage;
    }

    /**
     * @param string|null $categoryImage
     */
    public function setCategoryImage(?string $categoryImage): void
    {
        $this->categoryImage = $categoryImage;
    }

    /**
     * @return Collection<int, Paint>
     */
    public function getPaints(): Collection
    {
        return $this->paints;
    }

    public function addPaint(Paint $paint): static
    {
        if (!$this->paints->contains($paint)) {
            $this->paints->add($paint);
            $paint->setCategory($this);
        }

        return $this;
    }

    public function removePaint(Paint $paint): static
    {
        if ($this->paints->removeElement($paint)) {
            // set the owning side to null (unless already changed)
            if ($paint->getCategory() === $this) {
                $paint->setCategory(null);
            }
        }

        return $this;
    }
    /**
     * @return string|null
     */
    public function getCategoryFile(): ?string
    {
        return $this->categoryFile;
    }

    /**
     * @param string|null $categoryFile
     */
    public function setCategoryFile(?string $categoryFile): void
    {
        $this->categoryFile = $categoryFile;
    }

    public function __toString(): string
    {
        return $this->categoryName;
    }
}

<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\ManyToOne( inversedBy: 'comments')]
    private ?User $user = null;

    #[ORM\ManyToOne( inversedBy: 'comment')]
    private ?Paint $paint;

    /**
     * @param Paint|null $paint
     */
    public function __construct(?Paint $paint)
    {
        $this->paint = $paint;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getPaint(): ?Paint
    {
        return $this->paint;
    }

    public function setPaint(?Paint $paint): static
    {
        $this->paint = $paint;

        return $this;
    }

}


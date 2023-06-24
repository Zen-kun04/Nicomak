<?php

namespace App\Entity;

use App\Repository\ThanksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThanksRepository::class)]
class Thanks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'thanks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $From_User = null;

    #[ORM\ManyToOne(inversedBy: 'thanks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $To_User = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Reason = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $thanked_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromUser(): ?User
    {
        return $this->From_User;
    }

    public function setFromUser(?User $From_User): static
    {
        $this->From_User = $From_User;

        return $this;
    }

    public function getToUser(): ?User
    {
        return $this->To_User;
    }

    public function setToUser(?User $To_User): static
    {
        $this->To_User = $To_User;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->Reason;
    }

    public function setReason(string $Reason): static
    {
        $this->Reason = $Reason;

        return $this;
    }

    public function getThankedAt(): ?\DateTimeImmutable
    {
        return $this->thanked_at;
    }

    public function setThankedAt(\DateTimeImmutable $thanked_at): static
    {
        $this->thanked_at = $thanked_at;

        return $this;
    }
}

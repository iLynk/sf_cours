<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 255, nullable: true)]
private ?string $senderName = null;

#[ORM\Column(length: 255)]
#[Assert\NotBlank(message: 'Votre email est obligatoire')]
#[Assert\Email(message: "Cette adresse email n'est pas valide")]
private ?string $senderEmail = null;

#[ORM\Column(length: 255)]
#[Assert\NotBlank(message: 'Ce champ est obligatoire')]
private ?string $subject = null;

#[ORM\Column(type: Types::TEXT)]
#[Assert\NotBlank(message: 'Ce champ est obligatoire')]
private ?string $message = null;

#[ORM\Column]
private ?\DateTimeImmutable $sentAt = null;

#[ORM\Column(nullable: true)]
private ?\DateTimeImmutable $repliedAt = null;

public function getId(): ?int
{
return $this->id;
}

public function getSenderName(): ?string
{
return $this->senderName;
}

public function setSenderName(?string $senderName): static
{
$this->senderName = $senderName;

return $this;
}

public function getSenderEmail(): ?string
{
return $this->senderEmail;
}

public function setSenderEmail(string $senderEmail): static
{
$this->senderEmail = $senderEmail;

return $this;
}

public function getSubject(): ?string
{
return $this->subject;
}

public function setSubject(string $subject): static
{
$this->subject = $subject;

return $this;
}

public function getMessage(): ?string
{
return $this->message;
}

public function setMessage(string $message): static
{
$this->message = $message;

return $this;
}

public function getSentAt(): ?\DateTimeImmutable
{
return $this->sentAt;
}

public function setSentAt(\DateTimeImmutable $sentAt): static
{
$this->sentAt = $sentAt;

return $this;
}

public function getRepliedAt(): ?\DateTimeImmutable
{
return $this->repliedAt;
}

public function setRepliedAt(?\DateTimeImmutable $repliedAt): static
{
$this->repliedAt = $repliedAt;

return $this;
}
}

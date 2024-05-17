<?php

namespace App\Entity;

use App\Repository\CakeCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CakeCategoryRepository::class)]
#[UniqueEntity(fields: ['name'], message: 'Cette catégorie de gâteau existe déjà !')]
class CakeCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de la catégorie ne peut pas être vide')]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column]
    private ?bool $active = null;

    /**
     * @var Collection<int, Cake>
     */
    #[ORM\OneToMany(targetEntity: Cake::class, mappedBy: 'category')]
    private Collection $cakes;

    public function __construct()
    {
        $this->cakes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, Cake>
     */
    public function getCakes(): Collection
    {
        return $this->cakes;
    }

    public function addCake(Cake $cake): static
    {
        if (!$this->cakes->contains($cake)) {
            $this->cakes->add($cake);
            $cake->setCategory($this);
        }

        return $this;
    }

    public function removeCake(Cake $cake): static
    {
        if ($this->cakes->removeElement($cake)) {
            // set the owning side to null (unless already changed)
            if ($cake->getCategory() === $this) {
                $cake->setCategory(null);
            }
        }

        return $this;
    }
}

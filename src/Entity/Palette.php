<?php

namespace App\Entity;

use App\Repository\PaletteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaletteRepository::class)
 */
class Palette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color_1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color_2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color_3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color_4;

    /**
     * @ORM\ManyToMany(targetEntity=Favorites::class, mappedBy="color_id")
     */
    private $favorites;

    public function __construct()
    {
        $this->favorites = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getColor1(): ?string
    {
        return $this->color_1;
    }

    public function setColor1(string $color_1): self
    {
        $this->color_1 = $color_1;

        return $this;
    }

    public function getColor2(): ?string
    {
        return $this->color_2;
    }

    public function setColor2(string $color_2): self
    {
        $this->color_2 = $color_2;

        return $this;
    }

    public function getColor3(): ?string
    {
        return $this->color_3;
    }

    public function setColor3(string $color_3): self
    {
        $this->color_3 = $color_3;

        return $this;
    }

    public function getColor4(): ?string
    {
        return $this->color_4;
    }

    public function setColor4(string $color_4): self
    {
        $this->color_4 = $color_4;

        return $this;
    }

    /**
     * @return Collection|Favorites[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorites $favorite): self
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites[] = $favorite;
            $favorite->addColorId($this);
        }

        return $this;
    }

    public function removeFavorite(Favorites $favorite): self
    {
        if ($this->favorites->removeElement($favorite)) {
            $favorite->removeColorId($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}

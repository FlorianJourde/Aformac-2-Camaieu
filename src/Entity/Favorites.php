<?php

namespace App\Entity;

use App\Repository\FavoritesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavoritesRepository::class)
 */
class Favorites
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\ManyToMany(targetEntity=User::class, inversedBy="favorites")
   */
  public $user_id;

  /**
   * @ORM\ManyToMany(targetEntity=Palette::class, inversedBy="favorites")
   */
  public $color_id;

  public function __construct()
  {
    $this->user_id = new ArrayCollection();
    $this->color_id = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  /**
   * @return Collection|User[]
   */
  public function getUserId(): Collection
  {
    return $this->user_id;
  }

  public function addUserId(User $userId): self
  {
    if (!$this->user_id->contains($userId)) {
      $this->user_id[] = $userId;
    }

    return $this;
  }

  public function removeUserId(User $userId): self
  {
    $this->user_id->removeElement($userId);

    return $this;
  }

  /**
   * @return Collection|Palette[]
   */
  public function getColorId(): Collection
  {
    return $this->color_id;
  }

  public function addColorId(Palette $colorId): self
  {
    if (!$this->color_id->contains($colorId)) {
      $this->color_id[] = $colorId;
    }

    return $this;
  }

  public function removeColorId(Palette $colorId): self
  {
    $this->color_id->removeElement($colorId);

    return $this;
  }
}

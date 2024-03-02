<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
#[ORM\Table(name: "places")]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $placeNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $isFree = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'places')]
    private ?Car $car = null;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'place')]
    private Collection $reservations;

    #[ORM\OneToMany(targetEntity: Annulation::class, mappedBy: 'place')]
    private Collection $annulations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->annulations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaceNumber(): ?int
    {
        return $this->placeNumber;
    }

    public function setPlaceNumber(int $placeNumber): static
    {
        $this->placeNumber = $placeNumber;

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

    public function isIsFree(): ?bool
    {
        return $this->isFree;
    }

    public function setIsFree(bool $isFree): static
    {
        $this->isFree = $isFree;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): static
    {
        $this->car = $car;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setPlace($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getPlace() === $this) {
                $reservation->setPlace(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Annulation>
     */
    public function getAnnulations(): Collection
    {
        return $this->annulations;
    }

    public function addAnnulation(Annulation $annulation): static
    {
        if (!$this->annulations->contains($annulation)) {
            $this->annulations->add($annulation);
            $annulation->setPlace($this);
        }

        return $this;
    }

    public function removeAnnulation(Annulation $annulation): static
    {
        if ($this->annulations->removeElement($annulation)) {
            // set the owning side to null (unless already changed)
            if ($annulation->getPlace() === $this) {
                $annulation->setPlace(null);
            }
        }

        return $this;
    }
}

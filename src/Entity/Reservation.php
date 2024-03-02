<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[ORM\Table(name: "reservations")]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $reservationDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $children = null;

    #[ORM\Column(nullable: true)]
    private ?int $adult = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?User $person = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Trip $trip = null;

    #[ORM\OneToMany(targetEntity: Payment::class, mappedBy: 'reservation')]
    private Collection $payments;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Place $place = null;

    #[ORM\OneToMany(targetEntity: Annulation::class, mappedBy: 'reservation')]
    private Collection $annulations;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
        $this->annulations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationDate(): ?\DateTimeImmutable
    {
        return $this->reservationDate;
    }

    public function setReservationDate(\DateTimeImmutable $reservationDate): static
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    public function getChildren(): ?int
    {
        return $this->children;
    }

    public function setChildren(?int $children): static
    {
        $this->children = $children;

        return $this;
    }

    public function getAdult(): ?int
    {
        return $this->adult;
    }

    public function setAdult(?int $adult): static
    {
        $this->adult = $adult;

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

    public function getPerson(): ?User
    {
        return $this->person;
    }

    public function setPerson(?User $person): static
    {
        $this->person = $person;

        return $this;
    }

    public function getTrip(): ?Trip
    {
        return $this->trip;
    }

    public function setTrip(?Trip $trip): static
    {
        $this->trip = $trip;

        return $this;
    }

    /**
     * @return Collection<int, Payment>
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): static
    {
        if (!$this->payments->contains($payment)) {
            $this->payments->add($payment);
            $payment->setReservation($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): static
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getReservation() === $this) {
                $payment->setReservation(null);
            }
        }

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): static
    {
        $this->place = $place;

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
            $annulation->setReservation($this);
        }

        return $this;
    }

    public function removeAnnulation(Annulation $annulation): static
    {
        if ($this->annulations->removeElement($annulation)) {
            // set the owning side to null (unless already changed)
            if ($annulation->getReservation() === $this) {
                $annulation->setReservation(null);
            }
        }

        return $this;
    }
}

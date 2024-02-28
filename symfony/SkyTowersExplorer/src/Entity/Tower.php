<?php

namespace App\Entity;

use App\Repository\TowerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TowerRepository::class)]
class Tower
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $height;

    #[ORM\Column(type: 'integer')]
    private $floors;

    #[ORM\Column(type: 'integer')]
    private $yearCompleted;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getFloors(): ?int
    {
        return $this->floors;
    }

    public function setFloors(int $floors): self
    {
        $this->floors = $floors;

        return $this;
    }

    public function getYearCompleted(): ?int
    {
        return $this->yearCompleted;
    }

    public function setYearCompleted(int $yearCompleted): self
    {
        $this->yearCompleted = $yearCompleted;

        return $this;
    }
}

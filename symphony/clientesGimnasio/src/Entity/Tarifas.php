<?php

namespace App\Entity;

use App\Repository\TarifasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifasRepository::class)]
class Tarifas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tarifa = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifa(): ?string
    {
        return $this->tarifa;
    }

    public function setTarifa(string $tarifa): self
    {
        $this->tarifa = $tarifa;

        return $this;
    }
}

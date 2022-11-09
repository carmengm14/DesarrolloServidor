<?php

namespace App\Entity;

use App\Repository\ClientesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Tarifas;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClientesRepository::class)]
class Clientes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100)]
    private ?string $apellidos = null;

    /**
    * @ORM\Column(type="string", length=255)
    * @Assert\NotBlank()
    * @Assert\Email(message="El email {{ value }} no es válido")
    */
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 9)]
    private ?string $telefono = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $f_nacimiento = null;

    #[ORM\Column(length: 9)]
    private ?string $dni = null;

    #[ORM\Column(length: 20)]
    private ?string $n_cuenta = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tarifas $tarifas = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getFNacimiento(): ?\DateTimeInterface
    {
        return $this->f_nacimiento;
    }

    public function setFNacimiento(\DateTimeInterface $f_nacimiento): self
    {
        $this->f_nacimiento = $f_nacimiento;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(?string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getNCuenta(): ?string
    {
        return $this->n_cuenta;
    }

    public function setNCuenta(?string $n_cuenta): self
    {
        $this->n_cuenta = $n_cuenta;

        return $this;
    }


    public function getTarifas(): ?Tarifas
    {
        return $this->tarifas;
    }

    public function setTarifas(?Tarifas $tarifas): self
    {
        $this->tarifas = $tarifas;

        return $this;
    }
}

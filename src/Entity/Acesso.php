<?php

namespace App\Entity;

use App\Repository\AcessoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AcessoRepository::class)
 */
class Acesso
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $cod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=Cliente::class, inversedBy="acesso", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cod_cliente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCod(): ?string
    {
        return $this->cod;
    }

    public function setCod(string $cod): self
    {
        $this->cod = $cod;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCodCliente(): ?Cliente
    {
        return $this->cod_cliente;
    }

    public function setCodCliente(Cliente $cod_cliente): self
    {
        $this->cod_cliente = $cod_cliente;

        return $this;
    }
}

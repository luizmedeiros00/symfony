<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente
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
    private $nome;

    /**
     * @ORM\Column(type="date")
     */
    private $nascimento;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $cpf;

    /**
     * @ORM\OneToOne(targetEntity=Acesso::class, mappedBy="cod_cliente", cascade={"persist", "remove"})
     */
    private $acesso;

    /**
     * @ORM\OneToOne(targetEntity=Endereco::class, mappedBy="cod_cliente", cascade={"persist", "remove"})
     */
    private $endereco;

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

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getNascimento(): ?\DateTimeInterface
    {
        return $this->nascimento;
    }

    public function setNascimento(\DateTimeInterface $nascimento): self
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getAcesso(): ?Acesso
    {
        return $this->acesso;
    }

    public function setAcesso(Acesso $acesso): self
    {
        $this->acesso = $acesso;

        // set the owning side of the relation if necessary
        if ($acesso->getCodCliente() !== $this) {
            $acesso->setCodCliente($this);
        }

        return $this;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco): self
    {
        $this->endereco = $endereco;

        // set the owning side of the relation if necessary
        if ($endereco->getCodCliente() !== $this) {
            $endereco->setCodCliente($this);
        }

        return $this;
    }
}

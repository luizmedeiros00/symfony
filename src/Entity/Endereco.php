<?php

namespace App\Entity;

use App\Repository\EnderecoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnderecoRepository::class)
 */
class Endereco
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
     * @ORM\Column(type="string", length=500)
     */
    private $logradouro;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_imovel;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $complemento;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $bairro;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $cidade;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $estado;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\OneToOne(targetEntity=Cliente::class, inversedBy="endereco", cascade={"persist", "remove"})
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

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): self
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getNumeroImovel(): ?int
    {
        return $this->numero_imovel;
    }

    public function setNumeroImovel(int $numero_imovel): self
    {
        $this->numero_imovel = $numero_imovel;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): self
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

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

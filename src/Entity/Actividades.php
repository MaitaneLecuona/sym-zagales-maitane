<?php

namespace App\Entity;

use App\Repository\ActividadesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Actividades")
 * @ORM\Entity(repositoryClass="App\Repository\ActividadesRepository")
 * ::class
 */
class Actividades
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
    private $nombre;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string")
     */
    private $imagen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destino;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="Actividades")
     */
    private $idCateg;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="actividades")
     */
    private $usuario;

    public function __construct()
    {
        $this->actividades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getDestino(): ?string
    {
        return $this->destino;
    }

    public function setDestino(string $destino): self
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * @return Collection|Actividades[]
     */
    public function getActividades(): Collection
    {
        return $this->actividades;
    }

    public function addActividade(Actividades $actividade): self
    {
        if (!$this->actividades->contains($actividade)) {
            $this->actividades[] = $actividade;
            $actividade->setCategoria($this);
        }

        return $this;
    }

    public function removeActividade(Actividades $actividade): self
    {
        if ($this->actividades->removeElement($actividade)) {
            // set the owning side to null (unless already changed)
            if ($actividade->getCategoria() === $this) {
                $actividade->setCategoria(null);
            }
        }

        return $this;
    }

    public function getIdCateg(): ?categoria
    {
        return $this->idCateg;
    }

    public function setIdCateg(?categoria $idCateg): self
    {
        $this->idCateg = $idCateg;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}

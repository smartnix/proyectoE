<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=20)
     */
    private $id;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $CODIGO;

    /**
     * @ORM\Column(type="integer")
     */
    private $tipo_id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $apellido;

    /**
     * @ORM\Column(type="boolean")
     */
    private $primer_ingreso;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $tipo_usuario;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $codigo_asociado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ultimo_ingreso;

    /**
     * @ORM\Column(type="boolean")
     */
    private $usuario_web;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->id;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getCODIGO(): ?int
    {
        return $this->CODIGO;
    }

    public function setCODIGO(int $CODIGO): self
    {
        $this->CODIGO = $CODIGO;

        return $this;
    }

    public function getTipoId(): ?int
    {
        return $this->tipo_id;
    }

    public function setTipoId(int $tipo_id): self
    {
        $this->tipo_id = $tipo_id;

        return $this;
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getPrimerIngreso(): ?bool
    {
        return $this->primer_ingreso;
    }

    public function setPrimerIngreso(bool $primer_ingreso): self
    {
        $this->primer_ingreso = $primer_ingreso;

        return $this;
    }

    public function getTipoUsuario(): ?string
    {
        return $this->tipo_usuario;
    }

    public function setTipoUsuario(string $tipo_usuario): self
    {
        $this->tipo_usuario = $tipo_usuario;

        return $this;
    }

    public function getCodigoAsociado(): ?string
    {
        return $this->codigo_asociado;
    }

    public function setCodigoAsociado(string $codigo_asociado): self
    {
        $this->codigo_asociado = $codigo_asociado;

        return $this;
    }

    public function getUltimoIngreso(): ?\DateTimeInterface
    {
        return $this->ultimo_ingreso;
    }

    public function setUltimoIngreso(\DateTimeInterface $ultimo_ingreso): self
    {
        $this->ultimo_ingreso = $ultimo_ingreso;

        return $this;
    }

    public function getUsuarioWeb(): ?bool
    {
        return $this->usuario_web;
    }

    public function setUsuarioWeb(bool $usuario_web): self
    {
        $this->usuario_web = $usuario_web;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoDeIdentificacionRepository")
 */
class TipoDeIdentificacion
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $TIPO_ID;


    /**
     * @ORM\Column(type="string", length=45)
     */
    private $DESCRICION;

    public function getTipoId(): ?string
    {
        return $this->TIPO_ID;
    }

    public function setTipoId(int $TIPO_ID): self
    {
        $this->TIPO_ID = $TIPO_ID;

        return $this;
    }

    public function getDESCRICION(): ?string
    {
        return $this->DESCRICION;
    }

    public function setDESCRICION(string $DESCRICION): self
    {
        $this->DESCRICION = $DESCRICION;

        return $this;
    }
}

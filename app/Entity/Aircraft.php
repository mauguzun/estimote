<?php

namespace App\Entity;


use App\Entity\Traits\Hydratable;
use App\Entity\Raport;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\This;


/**
 * Aircraft
 * @ORM\Entity
 * @ORM\Table(name="aircrafts")
 */
class Aircraft
{
    use Hydratable, Notifiable;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(type="string" , name="ac_reg" , nullable=false ,unique=true )
     */
    private $acReg;

    /**
     * @return \App\Entity\Raport
     */
    public function getRaport():Raport
    {
        return $this->raport;
    }

    /**
     * @param mixed $raport
     * @return Aircraft
     */
    public function setRaport($raport)
    {
        $this->raport = $raport;
        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Raport",inversedBy="tail")
     *
     **/
    private $raport;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /***
     * @return string
     */
    public function getAcReg(): string
    {
        return $this->acReg;
    }

    /**
     * @param string $acReg
     * @return $this
     */
    public function setAcReg(string $acReg)
    {
        $this->acReg = $acReg;
        return $this;
    }
}
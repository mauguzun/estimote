<?php
namespace App\Entity;


use App\Entity\Traits\Hydratable;
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
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(type="string" , name="ac_reg" , nullable=false ,unique=true )
     */
    private $acReg;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
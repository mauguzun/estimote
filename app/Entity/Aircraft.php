<?php

namespace App\Entity;


use App\Entity\Traits\Hydratable;
use App\Entity\Raport;
use App\Entity\User;
use App\Entity\Device;
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
     * @ORM\Column(name="added",type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP" )
     */
    private $added ;

    /**
     * @ORM\Column(name="aircraft",type="string", nullable=false )
     */
private $aircraft;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id" ,referencedColumnName="id")
     **/
    private  $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }



    /**
     * @return mixed
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * @param mixed $added
     * @return Aircraft
     */
    public function setAdded($added)
    {
        $this->added = $added;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAircraft()
    {
        return $this->aircraft;
    }

    /**
     * @param mixed $aircraft
     * @return Aircraft
     */
    public function setAircraft($aircraft)
    {
        $this->aircraft = $aircraft;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Aircraft
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param mixed $device
     * @return Aircraft
     */
    public function setDevice($device)
    {
        $this->device = $device;
        return $this;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Device")
     * @ORM\JoinColumn(name="device_id" ,referencedColumnName="device_identifier")
     **/
    private  $device;

    /**
     * @ORM\ManyToOne(targetEntity="Stand")
     * @ORM\JoinColumn(name="stand_id" ,referencedColumnName="id")
     **/
    private  $stand;

    /**
     * @return mixed
     */
    public function getStand()
    {
        return $this->stand;
    }

    /**
     * @param mixed $stand
     * @return Aircraft
     */
    public function setStand($stand)
    {
        $this->stand = $stand;
        return $this;
    }


}
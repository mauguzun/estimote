<?php

namespace App\Entity;


use App\Entity\Traits\Hydratable;
use App\Entity\Raport;
use App\Entity\Device;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\This;


/**
 * Aircraft
 * @ORM\Entity
 * @ORM\Table(name="user_device")
 */
class UserDevice
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return UserDevice
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
     * @return UserDevice
     */
    public function setDevice($device)
    {
        $this->device = $device;
        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id" ,referencedColumnName="id")
     **/
    private  $user;

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     * @return UserDevice
     */
    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * @param mixed $stop
     * @return UserDevice
     */
    public function setStop($stop)
    {
        $this->stop = $stop;
        return $this;
    }
     /**
     * @ORM\ManyToOne(targetEntity="Device")
     * @ORM\JoinColumn(name="device_id" ,referencedColumnName="device_identifier")
     **/
    private  $device;


    /**
     * @ORM\Column(name="start",type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP" )
     */
    private $start ;
    /**
     * @ORM\Column(name="stop",type="datetime" )
     */
    private  $stop;
}
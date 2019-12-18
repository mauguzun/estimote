<?php

namespace App\Entity;


use App\Entity\Raport;
use App\Entity\Traits\Hydratable;
use Illuminate\Notifications\Notifiable;
use Doctrine\ORM\Mapping as ORM;
/**
 * Aircraft
 * @ORM\Entity
 * @ORM\Table(name="devices")
 */
class Device
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->deviceIdentifier;
    }

    /**
     * @param string $deviceIdentifier
     * @return Device
     */
    public function setDeviceIdentifier(string $deviceIdentifier): Device
    {
        $this->deviceIdentifier = $deviceIdentifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiId(): string
    {
        return $this->apiId;
    }

    /**
     * @param string $apiId
     * @return Device
     */
    public function setApiId(string $apiId): Device
    {
        $this->apiId = $apiId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Device
     */
    public function setDescription(string $description): Device
    {
        $this->description = $description;
        return $this;
    }
    use Hydratable, Notifiable;



    /**
     * @var integer
     *
     * @ORM\Column(name="device_identifier", type="string", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $deviceIdentifier;

    /**
     * @var string
     * @ORM\Column(type="string" , name="api_id" , nullable=true  )
     */
    private $apiId;

    /**
     * @var string
     * @ORM\Column(type="string" , name="description" , nullable=true  )
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="users")
     * @ORM\JoinColumn(name="user_id" ,referencedColumnName="id" , nullable=true )
     **/
    private  $user;

}
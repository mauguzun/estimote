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
     * @ORM\Column(type="string" , name="api_url" , nullable=true  )
     */
    private $apiUrl;

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     * @return Device
     */
    public function setApiUrl(string $apiUrl): Device
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }

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

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Device
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

}

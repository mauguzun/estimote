<?php
/**
 * Created by PhpStorm.
 * User: mauguzun
 * Date: 7/31/2019
 * Time: 8:13 PM
 */

namespace App\Entity;


use App\Entity\Raport;
use App\Entity\Traits\Hydratable;
use Illuminate\Notifications\Notifiable;
use Doctrine\ORM\Mapping as ORM;
/**
 * Log
 * @ORM\Entity
 * @ORM\Table(name="log")
 */
class Log
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
     * @ORM\Column(name="total",type="integer" )
     */
    private $total ;

    /**
     * @ORM\Column(name="saved",type="integer" )
     */
    private $saved ;

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
     * @return Log
     */
    public function setAdded($added)
    {
        $this->added = $added;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     * @return Log
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaved()
    {
        return $this->saved;
    }

    /**
     * @param mixed $saved
     * @return Log
     */
    public function setSaved($saved)
    {
        $this->saved = $saved;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeviceIdentifier(): string
    {
        return $this->deviceIdentifier;
    }

    /**
     * @param string $deviceIdentifier
     * @return Log
     */
    public function setDeviceIdentifier(string $deviceIdentifier): Log
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
     * @return Log
     */
    public function setApiId(string $apiId): Log
    {
        $this->apiId = $apiId;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(type="string" , name="device_identifier" , nullable=false  )
     */
    private $deviceIdentifier;

    /**
     * @ORM\Column(type="string" , name="api_id" , nullable=false  )
     */
    private $apiId;

}



<?php
/**
 * Created by PhpStorm.
 * User: mauguzun
 * Date: 7/31/2019
 * Time: 8:13 PM
 */

namespace App\Entity;

use App\Entity\Traits\Hydratable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Entity\Arpon;
use Symfony\Component\Console\Descriptor\ApplicationDescription;
/**
 * Raport
 * @ORM\Entity
 * @ORM\Table(name="reports")
 */
class Report
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
     * @ORM\Column(name="lattitude",type="decimal", scale=4 )
     */
    private $lat;

    /**
     * @ORM\Column(name="longitude",type="decimal", scale=4 )
     */
    private $long;

    /**
     * @return string
     */
    public function getDeviceIdentifier(): string
    {
        return $this->deviceIdentifier;
    }

    /**
     * @param string $deviceIdentifier
     * @return Report
     */
    public function setDeviceIdentifier(string $deviceIdentifier): Report
    {
        $this->deviceIdentifier = $deviceIdentifier;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Report
     */
    public function setId(int $id): Report
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     * @return Report
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param mixed $long
     * @return Report
     */
    public function setLong($long)
    {
        $this->long = $long;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStand()
    {
        return $this->stand;
    }

    /**
     * @param mixed $stand
     * @return Report
     */
    public function setStand($stand)
    {
        $this->stand = $stand;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * @param mixed $ts
     * @return Report
     */
    public function setTs($ts)
    {
        $this->ts = $ts;
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
     * @return Report
     */
    public function setAircraft($aircraft)
    {
        $this->aircraft = $aircraft;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * @param mixed $stamp
     * @return Report
     */
    public function setStamp($stamp)
    {
        $this->stamp = $stamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLeadTime()
    {
        return $this->leadTime;
    }

    /**
     * @param mixed $leadTime
     * @return Report
     */
    public function setLeadTime($leadTime)
    {
        $this->leadTime = $leadTime;
        return $this;
    }




    /**
     * @ORM\ManyToOne(targetEntity="Stand")
     * @ORM\JoinColumn(name="stand_id" ,referencedColumnName="id")
     **/
    private $stand;

    /**
     * @ORM\Column(name="ts" )
     */
    private $ts;

    /**
     * @ORM\ManyToOne(targetEntity="Aircraft")
     * @ORM\JoinColumn(name="aircraft_id" ,referencedColumnName="id")
     **/
    private $aircraft;
    /**
     * @ORM\Column(name="stamp",type="datetime" )
     */
    private $stamp;
    /**
     * @ORM\Column(type="integer" )
     */
    private $leadTime;
}
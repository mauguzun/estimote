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
use phpDocumentor\Reflection\Types\This;






/**
 * Raport
 * @ORM\Entity
 * @ORM\Table(name="beacon")
 */
class Beacon
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Beacon
     */
    public function setId(int $id): Beacon
    {
        $this->id = $id;
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
     * @return Beacon
     */
    public function setTs( $ts)
    {
        $this->ts = $ts;
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
     * @return Beacon
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
     * @return Beacon
     */
    public function setLong($long)
    {
        $this->long = $long;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param mixed $head
     * @return Beacon
     */
    public function setHead($head)
    {
        $this->head = $head;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrec()
    {
        return $this->prec;
    }

    /**
     * @param mixed $prec
     * @return Beacon
     */
    public function setPrec($prec)
    {
        $this->prec = $prec;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiff()
    {
        return $this->diff;
    }

    /**
     * @param mixed $diff
     * @return Beacon
     */
    public function setDiff($diff)
    {
        $this->diff = $diff;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSats()
    {
        return $this->sats;
    }

    /**
     * @param mixed $sats
     * @return Beacon
     */
    public function setSats($sats)
    {
        $this->sats = $sats;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     * @return Beacon
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }
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
     * @ORM\Column(name="ts", type="string" ,nullable=false)
     */
    private $ts;
   /**
    * @ORM\Column(name="lat", type="float", length=20, precision=10 ,nullable=false)
     */
    private $lat;

    /**
     * @ORM\Column(name="longitude", type="float", length=20, precision=10 ,nullable=false)
     */
    private $long;


    /**
     * @ORM\Column(name="head", type="float", length=20, precision=10 ,nullable=false)
     */
    private $head;

    /**
     * @ORM\Column(name="prec", type="float", length=20, precision=10 ,nullable=true)
     */
    private $prec;
    /**
     * @ORM\Column(name="diff", type="float", length=20, precision=10 ,nullable=true)
     */
    private $diff;
    /**
     * @ORM\Column(name="sats", type="float", length=20, precision=10 ,nullable=true)
     */
    private $sats;
    /**
     * @ORM\Column(name="speed", type="float", length=20, precision=10 ,nullable=true)
     */
    private $speed;
    /**
     * @ORM\Column(name="added",type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP" )
     */
    private $added ;

    /**
     * @return mixed
     */
    public function getAdded()
    {
        return $this->added;
    }


    public function setAdded($added)
    {
        $this->added = $added;
        return $this;
    }
}



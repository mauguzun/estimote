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

use App\Entity\Apron;


/**
 * Stand
 * @ORM\Entity
 * @ORM\Table(name="stands")
 * @ORM\Entity(repositoryClass="App\Entity\Repository\StandRepository")
 */
class Stand
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
     * @ORM\Column(type="string" , nullable=false )
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(type="decimal", scale=4 )
     */
    private $longitude;
    /**
     * @var string
     * @ORM\Column( type="decimal",  scale=4 )
     */
    private $latitude;


    /**
     * @ORM\ManyToOne(targetEntity="Apron",inversedBy="stands")
     * @ORM\JoinColumn(name="arpon_id" ,referencedColumnName="id")
     **/
    private  $apron;

    /**
     * @return mixed
     */
    public function getApron()
    {
        return $this->apron;
    }


    /**
     * @param $apron
     * @return $this
     */
    public function setApron($apron)
    {
        $this->apron = $apron;
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
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     * @return $this\
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }
}
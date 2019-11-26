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
use App\Entity\Raport;
use Symfony\Component\Console\Descriptor\ApplicationDescription;


/**
 * Status
 * @ORM\Entity
 * @ORM\Table(name="statuses")
 */
class Status
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
    private $status;
    /**
     * @var string
     * @ORM\Column(type="string"  )
     */
    private $description;


    /**
     * @return \App\Entity\Raport
     */
    public function getRaport():Raport
    {
        return $this->raport;
    }

    /**
     * @param mixed $raport
     * @return Status
     */
    public function setRaport($raport)
    {
        $this->raport = $raport;
        return $this;
    }



    /**
     * @ORM\ManyToOne(targetEntity="Raport",inversedBy="status")
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

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
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
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

}
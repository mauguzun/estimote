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
 * @ORM\Table(name="aprons")
 */
class Apron
{
    use Hydratable, Notifiable;

    public function __construct()
    {
        $this->stands = new ArrayCollection();
    }

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
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="Stand" , mappedBy="arpon")
     **/
    protected $stands;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Apron
     */
    public function setTitle(string $title): Apron
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getStands()
    {
        return $this->stands;
    }

    /**
     * @param Stand $stands
     * @return $this
     */
    public function setStands(Stand $stands)
    {
        $this->stands->add($stands);
        return $this;
    }


}
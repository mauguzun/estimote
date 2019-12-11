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
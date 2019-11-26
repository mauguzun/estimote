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



use App\Entity\Stand;


/**
 * Raport
 * @ORM\Entity
 * @ORM\Table(name="raports")
 */
class Raport
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
     * @ORM\Column(name="eta", type="string", length=10,  nullable=false)
     */
    private  $eta;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aircraft",inversedBy="raport")
     *
     **/
    private $tail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stand" , inversedBy="raport")
     *
     **/
    private  $stand;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status" , inversedBy="raport" )
     *
     **/
    private $status;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User" , inversedBy="raport" )
     **/
    private $user;

    /**
     * @return User
     */
    public function getUser():User
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Raport
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }



    /**
     * @ORM\Column( type="text" ,nullable = true)
     */
    private $comment;

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
    public function getEta():string
    {
        return $this->eta;
    }

    /**
     * @param mixed $eta
     * @return Raport
     */
    public function setEta($eta)
    {
        $this->eta = $eta;
        return $this;
    }

    /**
     * @return Aircraft
     */
    public function getTail():Aircraft
    {
        return $this->tail;
    }

    /**
     * @param mixed $tail
     * @return Raport
     */
    public function setTail(Aircraft $tail)
    {
        $this->tail = $tail;
        return $this;
    }

    /**
     * @return \App\Entity\Stand
     */
    public function getStand():Stand
    {
        return $this->stand;
    }

    /**
     * @param mixed $stand
     * @return Raport
     */
    public function setStand($stand)
    {
        $this->stand = $stand;
        return $this;
    }

    /**
     * @return Status
     */
    public function getStatus():Status
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Raport
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment():string
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     * @return Raport
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }



}
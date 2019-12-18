<?php

namespace App\Entity;

use App\Entity\Traits\Hydratable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User
 *
 * @ORM\Table(name="user", 
 *     uniqueConstraints={
 *     @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})
 * }, indexes={
 *     @ORM\Index(name="user_role_idx", columns={"role_id"})
 * })
 * @ORM\Entity(repositoryClass="App\Entity\Repository\UserRepository")
 */
class User implements Authenticatable
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
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=45, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="remember_token", type="string", length=100, nullable=true)
     */
    private $rememberToken;

    /**
     * @var string
     *
     * @ORM\Column(name="password_reset_token", type="string", length=100, nullable=true)
     */
    private $passwordResetToken;

    /**
     * @var \App\Entity\UserRole
     *
     * @ORM\ManyToOne(targetEntity="UserRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = bcrypt($password);

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set rememberToken
     *
     * @param string $rememberToken
     *
     * @return User
     */
    public function setRememberToken($rememberToken)
    {
        $this->rememberToken = $rememberToken;

        return $this;
    }

    /**
     * Get rememberToken
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    /**
     * Set role
     *
     * @param \App\Entity\UserRole $role
     *
     * @return User
     */
    public function setRole(\App\Entity\UserRole $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \App\Entity\UserRole
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @inheritdoc
     */
    public function getEmailForPasswordReset()
    {
        return $this->getEmail();
    }

    /**
     * @inheritdoc
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * @inheritdoc
     * @return int
     */
    public function getAuthIdentifier()
    {
        return $this->getId();
    }

    /**
     * @inheritdoc
     */
    public function getAuthPassword()
    {
        return $this->getPassword();
    }

    /**
     * Set passwordResetToken.
     *
     * @param string|null $passwordResetToken
     *
     * @return User
     */
    public function setPasswordResetToken($passwordResetToken = null)
    {
        $this->passwordResetToken = $passwordResetToken;

        return $this;
    }

    /**
     * Get passwordResetToken.
     *
     * @return string|null
     */
    public function getPasswordResetToken()
    {
        return $this->passwordResetToken;
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'rememberToken';
    }

    public function isAdmin()
    {
        return $this->role->getName() == UserRole::ROLE_ADMIN;
    }

    public function isAgent()
    {
        return $this->role->getName() == UserRole::ROLE_AGENT;
    }

    public function getFullName()
    {
        return $this->getName() . ' ' . $this->getLastname();
    }
}


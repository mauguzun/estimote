<?php

namespace App\Entity;

use App\Entity\Traits\Hydratable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserRole
 *
 * @ORM\Table(name="user_role")
 * @ORM\Entity
 */
class UserRole
{
    use Hydratable;
    
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';
    const ROLE_AGENT = 'ROLE_AGENT';

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
     * @ORM\Column(name="name", type="string", length=255, nullable=true, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var ArrayCollection|\App\Entity\UserRolePermission[]
     *
     * @ORM\OneToMany(
     *     targetEntity="UserRolePermission",
     *     mappedBy="role",
     *     cascade={"all"},
     *     orphanRemoval=true
     * )
     */
    protected $permissions;


    public function __construct(string $name, string $description)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->permissions = new ArrayCollection();
    }

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
     * @return UserRole
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
     * Set description
     *
     * @param string $description
     *
     * @return UserRole
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add permission
     *
     * @param string |\App\Entity\UserRolePermission $permission
     *
     * @return UserRole
     */
    public function addPermission($permission)
    {
        if (is_string($permission)) {
            $permission = \EntityManager::getRepository(UserRolePermission::class)->findOneBy(
                    ['role' => $this, 'name' => $permission]
                ) ??
                new UserRolePermission($permission, $permission);
        }

        $this->permissions[] = $permission;
        $permission->setRole($this);
        
        return $this;
    }

    /**
     * Remove permission
     *
     * @param string|\App\Entity\UserRolePermission $permission
     */
    public function removePermission($permission)
    {
        if (is_string($permission)) {
            $permission = \EntityManager::getRepository(UserRolePermission::class)->findOneBy(
                ['role' => $this, 'name' => $permission]
            );
        }

        if ($this->permissions->contains($permission)) {
            $this->permissions->removeElement($permission);
        }
    }

    /**
     * Get permissions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    public function permissionsToArray()
    {
        $permissions = [];

        /** @var UserRolePermission $permission */
        foreach ($this->getPermissions() as $permission) {
            $permissions[] = $permission->getName();
        }

        return $permissions;
    }

    public function isRoot(): bool
    {
        return $this->getName() == static::ROLE_ADMIN;
    }

    public function hasPermission($permission): bool
    {
        return in_array($permission, $this->permissionsToArray());
    }
}


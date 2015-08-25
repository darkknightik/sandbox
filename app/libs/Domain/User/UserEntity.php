<?php
namespace Tiplap\Domain\User;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Tiplap\Doctrine\Entities\IdentifiedEntity;
use Tiplap\Domain\Role\RoleEntity;


/**
 * User Entity
 *
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="db_user", indexes={
 * })
 * @author Tomáš Volšanský <tomas@volsansky.cz>
 */
class UserEntity extends IdentifiedEntity
{
    /**
     * @ORM\Column(name="username", type="text")
     * @var string
     */
    protected $username;

    /**
     * @ORM\Column(name="password", type="text")
     * @var string
     */
    protected $password;

    /**
     * @ORM\Column(name="email", type="text")
     * @var string
     */
    protected $email;

    /**
     * @ORM\ManyToMany(targetEntity="Tiplap\Domain\Role\RoleEntity", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="db_user_has_role",
     * joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")})
     * @var Collection|RoleEntity[]
     */
    protected $role;

    /**
     * @ORM\Column(name="status", type="integer")
     * @var int
     */
    protected $status;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return Collection|RoleEntity[]
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param Collection|RoleEntity[] $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }



    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
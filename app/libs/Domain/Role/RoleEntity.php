<?php
namespace Tiplap\Domain\Role;

use Doctrine\ORM\Mapping as ORM;
use Tiplap\Doctrine\Entities\IdentifiedEntity;


/**
 * Role Entity
 *
 * @ORM\Entity(repositoryClass="RoleRepository")
 * @ORM\Table(name="db_role", indexes={
 * })
 * @author Tomáš Volšanský <tomas@volsansky.cz>
 */
class RoleEntity extends IdentifiedEntity
{
    /**
     * @ORM\Column(name="name", type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(name="key", type="string")
     * @var string
     */
    protected $key;

    /**
     * @ORM\Column(name="description", type="text")
     * @var string
     */
    protected $description;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



}
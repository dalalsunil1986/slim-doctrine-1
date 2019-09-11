<?php

namespace App\Entity;

use Doctrine\Mapping as ORM;

/**
 * @Entity
 * @Table(name="user")
 */
class User
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     * @var integer
     */
    protected $id;

    /**
     * @Column(type="string", length=255, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @Column(type="string", length=255, nullable=false)
     * @var string
     */
    private $email;

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

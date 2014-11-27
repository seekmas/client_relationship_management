<?php

namespace Sim\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Linkman
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Gedmo\Loggable()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Client
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime" , nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\OneToMany(targetEntity="Project" , mappedBy="client")
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity="Fluent" , mappedBy="client")
     */
    private $fluent;

    /**
     * @ORM\Column(name="initial" , type="string" , length=1 , nullable=true)
     */
    private $initial;

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
     * @return Linkman
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
     * @return Linkman
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
     * @return mixed
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * @return Linkman
     * @param mixed $connect
     */
    public function setConnect($connect)
    {
        $this->connect = $connect;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConnectId()
    {
        return $this->connect_id;
    }

    /**
     * @return Linkman
     * @param mixed $connect_id
     */
    public function setConnectId($connect_id)
    {
        $this->connect_id = $connect_id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return Linkman
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @return Linkman
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @return Client
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return Linkman
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFluent()
    {
        return $this->fluent;
    }

    /**
     * @return Client
     * @param mixed $fluent
     */
    public function setFluent($fluent)
    {
        $this->fluent = $fluent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitial()
    {
        return $this->initial;
    }

    /**
     * @return Client
     * @param mixed $initial
     */
    public function setInitial($initial)
    {
        $this->initial = $initial;
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

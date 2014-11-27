<?php

namespace Sim\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Fixed
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Gedmo\Loggable()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Fixed
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
     * @var boolean
     * @Gedmo\Versioned
     * @ORM\Column(name="gender", type="smallint" , nullable=true)
     */
    private $gender;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="age", type="smallint" , nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="work", type="string", length=255 , nullable=true)
     */
    private $work;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="education", type="string", length=255 , nullable=true)
     */
    private $education;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="income", type="integer" , nullable=true)
     */
    private $income;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="value", type="string" , length=255 , nullable=true)
     */
    private $value;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="relationship", type="string" , length=255 , nullable=true)
     */
    private $relationship;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="deleted_at", type="datetime" , nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\OneToOne(targetEntity="Connect" , inversedBy="fixed")
     * @ORM\JoinColumn(name="connect_id" , referencedColumnName="id")
     */
    private $connect;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(name="connect_id" , type="integer" , nullable=true )
     */
    private $connectId;

    /**
     * @ORM\OneToMany(targetEntity="Fluent" , mappedBy="fixed")
     */
    private $fluent;

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
     * Set gender
     *
     * @param boolean $gender
     * @return Fixed
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Fixed
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set work
     *
     * @param string $work
     * @return Fixed
     */
    public function setWork($work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get work
     *
     * @return string 
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * Set education
     *
     * @param string $education
     * @return Fixed
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string 
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set income
     *
     * @param integer $income
     * @return Fixed
     */
    public function setIncome($income)
    {
        $this->income = $income;

        return $this;
    }

    /**
     * Get income
     *
     * @return integer 
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return Fixed
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set relationship
     *
     * @param integer $relationship
     * @return Fixed
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;

        return $this;
    }

    /**
     * Get relationship
     *
     * @return integer 
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Fixed
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Fixed
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Fixed
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @return mixed
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * @return Fixed
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
        return $this->connectId;
    }

    /**
     * @return Fixed
     * @param mixed $connectId
     */
    public function setConnectId($connectId)
    {
        $this->connectId = $connectId;
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
     * @return Fixed
     * @param mixed $fluent
     */
    public function setFluent($fluent)
    {
        $this->fluent = $fluent;
        return $this;
    }
}

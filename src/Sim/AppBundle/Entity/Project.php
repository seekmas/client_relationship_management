<?php

namespace Sim\AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;


/**
 * Project
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\Loggable()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Project
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
     * @ORM\Column(name="project_name", type="string", length=255 , nullable=true)
     */
    private $projectName;

    /**
     * @var \DateTime
     * @Gedmo\Versioned
     * @ORM\Column(name="sign_at", type="datetime" , nullable=true)
     */
    private $signAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_at", type="datetime" , nullable=true)
     */
    private $startAt;

    /**
     * @var \DateTime
     * @Gedmo\Versioned
     * @ORM\Column(name="end_at", type="datetime" , nullable=true)
     */
    private $endAt;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="contact_payment", type="decimal" , precision=10, scale=2 , nullable=true)
     */
    private $contactPayment;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="description", type="text" , nullable=true , nullable=true)
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
     * @ORM\OneToMany(targetEntity="Event" , mappedBy="project")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="Client" , inversedBy="project")
     * @ORM\JoinColumn(name="client_id" , referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\Column(name="client_id" , type="integer" , nullable=true)
     */
    private $clientId;

    /**
     * @ORM\Column(name="date_filter" , type="string" , length=64)
     */
    private $dateFilter;

    /**
     * @ORM\OneToMany(targetEntity="Connect" , mappedBy="project")
     */
    private $connect;

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
     * Set projectName
     *
     * @param string $projectName
     * @return Project
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set signAt
     *
     * @param \DateTime $signAt
     * @return Project
     */
    public function setSignAt($signAt)
    {
        $this->signAt = $signAt;

        return $this;
    }

    /**
     * Get signAt
     *
     * @return \DateTime 
     */
    public function getSignAt()
    {
        return $this->signAt;
    }

    /**
     * Set startAt
     *
     * @param \DateTime $startAt
     * @return Project
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Get startAt
     *
     * @return \DateTime 
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Set endAt
     *
     * @param \DateTime $endAt
     * @return Project
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return \DateTime 
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Set contactPayment
     *
     * @param string $contactPayment
     * @return Project
     */
    public function setContactPayment($contactPayment)
    {
        $this->contactPayment = $contactPayment;

        return $this;
    }

    /**
     * Get contactPayment
     *
     * @return string 
     */
    public function getContactPayment()
    {
        return $this->contactPayment;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Project
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Project
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
     * @return Project
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
     * @return Project
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
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return Project
     * @param mixed $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return Project
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return Project
     * @param mixed $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateFilter()
    {
        return $this->dateFilter;
    }

    /**
     * @return Project
     * @param mixed $dateFilter
     */
    public function setDateFilter($dateFilter)
    {
        $this->dateFilter = $dateFilter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * @return Project
     * @param mixed $connect
     */
    public function setConnect($connect)
    {
        $this->connect = $connect;
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function addDateFilter()
    {
        $this->dateFilter = $this->getCreatedAt()->format('Y年m月');
    }

    public function __toString()
    {
        return $this->getProjectName();
    }
}

<?php

namespace Sim\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Fluent
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Gedmo\Loggable()
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Fluent
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
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="Fixed" , inversedBy="fluent")
     * @ORM\JoinColumn(name="fixed_id" , referencedColumnName="id")
     */
    private $fixed;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="fixed_id", type="integer" , nullable=true)
     */
    private $fixedId;

    /**
     * @ORM\ManyToOne(targetEntity="Client" , inversedBy="fluent")
     * @ORM\JoinColumn(name="client_id" , referencedColumnName="id")
     */
    private $client;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="client_id", type="integer" , nullable=true)
     */
    private $clientId;

    /**
     * @ORM\ManyToOne(targetEntity="Project" , inversedBy="fluent")
     * @ORM\JoinColumn(name="project_id" , referencedColumnName="id")
     */
    private $project;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="project_id", type="integer" , nullable=true)
     */
    private $projectId;

    /**
     * @ORM\Column(name="deleted_at" , type="datetime" , nullable=true)
     */
    private $deletedAt;

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
     * Set subject
     *
     * @param string $subject
     * @return Fluent
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Fluent
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getFixed()
    {
        return $this->fixed;
    }

    /**
     * @return Fluent
     * @param mixed $fixed
     */
    public function setFixed($fixed)
    {
        $this->fixed = $fixed;
        return $this;
    }

    /**
     * @return int
     */
    public function getFixedId()
    {
        return $this->fixedId;
    }

    /**
     * @return Fluent
     * @param int $fixedId
     */
    public function setFixedId($fixedId)
    {
        $this->fixedId = $fixedId;
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
     * @return Fluent
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return Fluent
     * @param int $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @return Fluent
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @return Fluent
     * @param int $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @return Fluent
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function __toString()
    {
        return $this->getSubject();
    }
}

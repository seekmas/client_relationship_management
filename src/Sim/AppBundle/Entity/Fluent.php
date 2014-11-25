<?php

namespace Sim\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fluent
 *
 * @ORM\Table()
 * @ORM\Entity
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
     *
     * @ORM\Column(name="fixed_id", type="integer" , nullable=true)
     */
    private $fixedId;

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
}

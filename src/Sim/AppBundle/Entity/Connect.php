<?php

namespace Sim\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Connect
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Gedmo\Loggable()
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Connect
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
     * @ORM\Column(name="name" , type="string" , length=255 , nullable=true)
     */
    private $name;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="email", type="string", length=255 , nullable=true)
     */
    private $email;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="phone", type="string", length=255 , nullable=true)
     */
    private $phone;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="mobile", type="string", length=255 , nullable=true)
     */
    private $mobile;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="fax", type="string", length=255 , nullable=true)
     */
    private $fax;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="address", type="string", length=255 , nullable=true)
     */
    private $address;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="blog", type="string", length=255 , nullable=true)
     */
    private $blog;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="website", type="string", length=255 , nullable=true)
     */
    private $website;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="weibo", type="string", length=255 , nullable=true)
     */
    private $weibo;

    /**
     * @var integer
     * @Gedmo\Versioned
     * @ORM\Column(name="qq", type="bigint" , nullable=true)
     */
    private $qq;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="twitter", type="string", length=255 , nullable=true)
     */
    private $twitter;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="facebook", type="string", length=255 , nullable=true)
     */
    private $facebook;

    /**
     * @var string
     * @Gedmo\Versioned
     * @ORM\Column(name="linkedin", type="string", length=255 , nullable=true)
     */
    private $linkedin;

    /**
     * @Gedmo\Versioned
     * @ORM\Column(name="description" , type="text" , nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="created_at" , type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at" , type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(name="deleted_at" , type="datetime" , nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\ManyToMany(targetEntity="Project" , mappedBy="connect")
     */
    private $project;

    /**
     * @ORM\Column(name="date_filter" , type="string" , length=64)
     */
    private $dateFilter;

    /**
     * @ORM\OneToOne(targetEntity="Fixed" , mappedBy="connect")
     */
    private $fixed;

    public function __construct() {
        $this->groups = new ArrayCollection();
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
     * Set email
     *
     * @param string $email
     * @return Connect
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
     * Set phone
     *
     * @param string $phone
     * @return Connect
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Connect
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Connect
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Connect
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set blog
     *
     * @param string $blog
     * @return Connect
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return string 
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Connect
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set weibo
     *
     * @param string $weibo
     * @return Connect
     */
    public function setWeibo($weibo)
    {
        $this->weibo = $weibo;

        return $this;
    }

    /**
     * Get weibo
     *
     * @return string 
     */
    public function getWeibo()
    {
        return $this->weibo;
    }

    /**
     * Set qq
     *
     * @param integer $qq
     * @return Connect
     */
    public function setQq($qq)
    {
        $this->qq = $qq;

        return $this;
    }

    /**
     * Get qq
     *
     * @return integer 
     */
    public function getQq()
    {
        return $this->qq;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Connect
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Connect
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     * @return Connect
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string 
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return Connect
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
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
     * @return Connect
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Connect
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Connect
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return Connect
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
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
     * @return Connect
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->project[] = $project;
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
     * @return Connect
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
    public function getFixed()
    {
        return $this->fixed;
    }

    /**
     * @return Connect
     * @param mixed $fixed
     */
    public function setFixed($fixed)
    {
        $this->fixed = $fixed;
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
        return $this->getName();
    }
}

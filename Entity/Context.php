<?php

namespace SanSIS\Core\MessagingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SanSIS\Core\BaseBundle\Entity\AbstractBase;

/**
 * Context
 *
 * @ORM\Table(name="core_context")
 * @ORM\Entity(repositoryClass="\SanSIS\Core\BaseBundle\EntityRepository\AbstractBase")
 */
class Context extends AbstractBase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=256, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="screen_name", type="string", length=256, nullable=false)
     */
    private $screenName;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false, options={"default" = 1})
     */
    private $status = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_context", type="integer", nullable=false, options={"default" = 1})
     */
    private $userContext = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="group_context", type="integer", nullable=false, options={"default" = 0})
     */
    private $groupContext = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="group_context_route_pattern", type="string", length=256, nullable=true)
     */
    private $groupContextRoutePattern;

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
     *
     * @return the string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     *
     * @param string $screenName
     */
    public function setScreenName($screenName)
    {
        $this->screenName = $screenName;
        return $this;
    }

    /**
     *
     * @return the integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     *
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     *
     * @return the integer
     */
    public function getUserContext()
    {
        return $this->userContext;
    }

    /**
     *
     * @param $userContext
     */
    public function setUserContext($userContext)
    {
        $this->userContext = $userContext;
        return $this;
    }

    /**
     *
     * @return the integer
     */
    public function getGroupContext()
    {
        return $this->groupContext;
    }

    /**
     *
     * @param $groupContext
     */
    public function setGroupContext($groupContext)
    {
        $this->groupContext = $groupContext;
        return $this;
    }

    /**
     *
     * @return the string
     */
    public function getGroupContextRoutePattern()
    {
        return $this->groupContextRoutePattern;
    }

    /**
     *
     * @param string $groupContextRoutePattern
     */
    public function setgroupContextRoutePattern($groupContextRoutePattern)
    {
        $this->groupContextRoutePattern = $groupContextRoutePattern;
        return $this;
    }

}

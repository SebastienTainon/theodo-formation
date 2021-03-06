<?php

namespace StarWars\StarWarsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Jedi
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class Jedi extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var Lightsaber
     *
     * @ORM\OneToMany(targetEntity="Lightsaber", mappedBy="jedi", cascade={"persist"})
     */
    private $lightsabers;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        parent::__construct();
        $this->lightsabers = new ArrayCollection();
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Jedi
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Add lightsabers
     *
     * @param Lightsaber $lightsabers
     *
     * @return Jedi
     */
    public function addLightsaber(Lightsaber $lightsabers)
    {
        $this->lightsabers[] = $lightsabers;
    
        return $this;
    }

    /**
     * Remove lightsabers
     *
     * @param Lightsaber $lightsabers
     */
    public function removeLightsaber(Lightsaber $lightsabers)
    {
        $this->lightsabers->removeElement($lightsabers);
    }

    /**
     * Get lightsabers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLightsabers()
    {
        return $this->lightsabers;
    }
}
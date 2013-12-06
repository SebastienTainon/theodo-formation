<?php

namespace StarWars\StarWarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lightsaber
 *
 * @ORM\Table(name="lightsaber")
 * @ORM\Entity
 */
class Lightsaber
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
     * @ORM\ManyToOne(targetEntity="Color")
     */
    private $color;

    /**
     * @var Jedi
     *
     * @ORM\ManyToOne(targetEntity="Jedi", inversedBy="lightsabers")
     */
    private $jedi;

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
     * Set color
     *
     * @param Color $color
     *
     * @return Lightsaber
     */
    public function setColor(Color $color = null)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set jedi
     *
     * @param \StarWars\StarWarsBundle\Entity\Jedi $jedi
     * @return Lightsaber
     */
    public function setJedi(\StarWars\StarWarsBundle\Entity\Jedi $jedi = null)
    {
        $this->jedi = $jedi;
    
        return $this;
    }

    /**
     * Get jedi
     *
     * @return \StarWars\StarWarsBundle\Entity\Jedi 
     */
    public function getJedi()
    {
        return $this->jedi;
    }
}
<?php

namespace StarWars\StarWarsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temple
 *
 * @ORM\Table(name="temple")
 * @ORM\Entity
 */
class Temple
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
     * @return Temple
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
}
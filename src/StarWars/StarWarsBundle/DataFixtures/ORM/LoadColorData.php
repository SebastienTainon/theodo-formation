<?php

namespace StarWars\StarWarsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use StarWars\StarWarsBundle\Entity\Color;

/**
 * @author Sebastien Tainon <sebastient@theodo.fr>
 */
class LoadColorData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $objectManager)
    {
        $colors = array('vert', 'bleu');

        foreach ($colors as $color) {
            $colorEntity = new Color();
            $colorEntity->setName($color);
            $this->addReference('color_' . $color, $colorEntity);
            $objectManager->persist($colorEntity);
        }

        $objectManager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}

<?php

namespace StarWars\StarWarsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use StarWars\StarWarsBundle\Entity\Temple;

/**
 * @author Sebastien Tainon <sebastient@theodo.fr>
 */
class LoadTempleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $objectManager)
    {
        $temples = array('vert', 'bleu');

        foreach ($temples as $color) {
            $templeEntity = new Temple();
            $templeEntity->setColor($this->getReference('color_' . $color));
            $this->addReference('temple_' . $color, $templeEntity);
            $objectManager->persist($templeEntity);
        }

        $objectManager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}

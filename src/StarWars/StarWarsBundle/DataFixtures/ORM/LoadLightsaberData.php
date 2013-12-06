<?php

namespace StarWars\StarWarsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use StarWars\StarWarsBundle\Entity\Lightsaber;

/**
 * @author Sebastien Tainon <sebastient@theodo.fr>
 */
class LoadLightsaberData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $objectManager)
    {
        $lightSabers = array(
            'vert' => array('yoda'),
            'bleu' => array('luke'),
        );

        foreach ($lightSabers as $color => $owners) {
            $ligthsaberEntity = new Lightsaber();
            $ligthsaberEntity->setColor($this->getReference('color_' . $color));
            $this->addReference('lightsaber_' . $color, $ligthsaberEntity);
            $objectManager->persist($ligthsaberEntity);

            foreach ($owners as $jedi) {
                $jediEntity = $this->getReference('jedi_' . $jedi);
                $jediEntity->addLightsaber($ligthsaberEntity);
                $ligthsaberEntity->setJedi($jediEntity);
                $objectManager->persist($jediEntity);
            }
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

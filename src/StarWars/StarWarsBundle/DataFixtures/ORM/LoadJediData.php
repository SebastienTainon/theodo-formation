<?php

namespace StarWars\StarWarsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use StarWars\StarWarsBundle\Entity\Jedi;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author Sebastien Tainon <sebastient@theodo.fr>
 */
class LoadJediData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $objectManager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $users = array(
            'yoda' => array(
                'username' => 'yoda',
                "password" => 'yoda',
                'email' => 'yoda@jedi.fr',
                'enabled' => true,
            ),
            'luke' => array(
                'username' => 'luke',
                "password" => 'luke',
                'email' => 'luke@jedi.fr',
                'enabled' => true,
            ),
        );

        foreach ($users as $key => $user) {
            $userEntity = new Jedi();
            $userEntity->setUsername($user['username']);
            $userEntity->setEmail($user['email']);
            $userEntity->setEnabled($user['enabled']);
            $userEntity->setFirstName('jedi');
            $encoderUserAdmin = $this->container->get('security.encoder_factory')->getEncoder($userEntity);
            $encodedPass = $encoderUserAdmin->encodePassword($user['password'], $userEntity->getSalt());
            $userEntity->setPassword($encodedPass);
            $userManager->updateUser($userEntity, false);
            $this->addReference('jedi_' . $key, $userEntity);
        }

        $this->container->get('doctrine.orm.entity_manager')->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}

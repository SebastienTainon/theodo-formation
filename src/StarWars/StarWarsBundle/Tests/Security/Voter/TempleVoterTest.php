<?php

namespace StarWars\StarWarsBundle\Tests\Security\Voter;

use Prophecy\Prophet;
use StarWars\StarWarsBundle\Entity\Color;
use StarWars\StarWarsBundle\Entity\Lightsaber;
use StarWars\StarWarsBundle\Entity\Temple;
use StarWars\StarWarsBundle\Security\Voter\TempleVoter;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

/**
 * @author Sebastien Tainon <sebastient@theodo.fr>
 */
class TempleVoterTest extends \PHPUnit_Framework_TestCase
{
    private $prophet;
    private $user;
    private $token;

    public function setUp()
    {
        $this->prophet = new Prophet();

        $this->user  = $this->prophet->prophesize('StarWars\StarWarsBundle\Entity\Jedi');
        $this->token = $this->prophet->prophesize('Symfony\Component\Security\Core\Authentication\Token\TokenInterface');
    }

    public function tearDown()
    {
        $this->prophet->checkPredictions();
    }

    public function testJediHasAccessToTheGoodTemple()
    {
        $colorGreen = $this->prophet->prophesize('StarWars\StarWarsBundle\Entity\Color');
        $colorGreen->getName()->willReturn('green');

        $colorBlue = $this->prophet->prophesize('StarWars\StarWarsBundle\Entity\Color');
        $colorBlue->getName()->willReturn('blue');

        $temple = new Temple();
        $temple->setColor($colorBlue->reveal());

        $lightsaber = new Lightsaber();
        $lightsaber->setColor($colorBlue->reveal());
        $this->user->getLightsabers()->willReturn(array($lightsaber));
        $this->token->getUser()->willReturn($this->user->reveal());

        $templeVoter = new TempleVoter();
        $this->assertEquals(VoterInterface::ACCESS_GRANTED, $templeVoter->vote($this->token->reveal(), $temple, array('TEMPLE_SHOW')));
    }
}

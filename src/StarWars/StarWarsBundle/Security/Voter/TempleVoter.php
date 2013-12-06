<?php

namespace StarWars\StarWarsBundle\Security\Voter;

use StarWars\StarWarsBundle\Entity\Jedi;
use StarWars\StarWarsBundle\Entity\Temple;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

class TempleVoter implements VoterInterface
{
    /**
     * {@inheritdoc}
     */
    public function supportsAttribute($attribute)
    {
        return 'TEMPLE_SHOW' === $attribute;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsClass($class)
    {
        return $class instanceof Temple;
    }

    /**
     * {@inheritdoc}
     */
    public function vote(TokenInterface $token, $object, array $attributes)
    {
        foreach ($attributes as $attribute) {
            if ($this->supportsAttribute($attribute) && $this->supportsClass($object)) {
                $jedi = $token->getUser();
                if ($jedi instanceof Jedi) {
                    foreach ($jedi->getLightsabers() as $lightsaber) {
                        if ($lightsaber->getColor() == $object->getColor()) {
                            return VoterInterface::ACCESS_GRANTED;
                        }
                    }
                }
            }
        }
    }
}

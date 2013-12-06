<?php

namespace StarWars\StarWarsBundle\Controller;

use StarWars\StarWarsBundle\Entity\Temple;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class TempleController extends Controller
{
    public function listAction()
    {
        $temples = $this->getDoctrine()->getRepository('StarWarsBundle:Temple')->findAll();

        return $this->render('StarWarsBundle:Temple:list.html.twig', array(
            'temples' => $temples,
        ));
    }

    public function showAction(Temple $temple)
    {
        if (!$this->get('security.context')->isGranted('TEMPLE_SHOW', $temple)) {
            throw new AccessDeniedException('access denied');
        }

        return $this->render('StarWarsBundle:Temple:show.html.twig', array(
            'temple' => $temple,
        ));
    }
}

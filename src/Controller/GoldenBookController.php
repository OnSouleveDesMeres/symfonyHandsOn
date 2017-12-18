<?php

namespace App\Controller;

use App\Entity\GoldenBook;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class GoldenBookController extends Controller
{
    /**
     * @Route("/livre-d-or", name="golden_book")
     */
    public function index()
    {

        $session = new Session();
        $session->start();

        $isConnected = $session->get('isConnected');
        $goldenList = $this->getDoctrine()->getRepository(GoldenBook::class)->findAll();

        return $this->render('golden.html.twig', array(
            'title' => "Livre d'or",
            'body' => "Ce qu'ils pensent de moi",
            'scripts' => "",
            'connected' => $isConnected,
            'goldenList' => $goldenList,
        ));
    }
}

<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Competences;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CompetencesController extends Controller
{
    /**
     * @Route("/mes-competences", name="competences")
     */
    public function index()
    {

        $session = new Session();
        $session->start();

        $isConnected = $session->get('isConnected');

        $categoryList = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('competences.html.twig', array(
            'title' => "Mes compétences",
            'body' => "Voici les différentes compétences que j'ai pu acquérir au fil de mes années d'études",
            'scripts' => "",
            'connected' => $isConnected,
            'categoriesList' => $categoryList,
        ));
    }

}

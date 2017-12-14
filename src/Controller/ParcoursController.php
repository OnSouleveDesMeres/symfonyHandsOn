<?php

namespace App\Controller;

use App\Entity\Diplomas;
use App\Entity\Jobs;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ParcoursController extends Controller
{
    /**
     * @Route("/mon-parcours", name="parcours")
     */
    public function index()
    {

        $jobsList = $this->getDoctrine()->getRepository(Jobs::class)->findBy([], ['id' => 'DESC']);
        $diplomasList = $this->getDoctrine()->getRepository(Diplomas::class)->findBy([], ['id' => 'DESC']);

        return $this->render('parcours.html.twig', array(
            'title' => "Mon parcours",
            'body' => "Voici mon cursus scolaire ainsi que les différents jobs effectués",
            'scripts' => "",
            'connected' => true,
            'jobs' => $jobsList,
            'diplomas' => $diplomasList,
        ));
    }
}

<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * @Route("/me-contacter", name="contact")
     */
    public function index()
    {
        return $this->render('contact.html.twig', array(
            'title' => "Mon parcours",
            'body' => "Contactez-moi en remplissant le formulaire suivant",
            'scripts' => "",
            'connected' => true,
        ));
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 10/12/17
 * Time: 22:26
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{

    /**
     * @Route("/")
     * @Route("/accueil", name="accueil")
     * @return Response
     */
    public function accueil(){

        $session = new Session();
        $session->start();

        $isConnected = $session->get('isConnected');

        return $this->render('index.html.twig', array(
            'title' => "Accueil",
            'body' => "<h2>Vous êtes bien sur l'accueil</h2>",
            'scripts' => "",
            'connected' => $isConnected,
        ));
    }


    /**
     * @Route("/error")
     * @return Response
     */
    public function error(){
        return $this->render('base.html.twig', array(
            'title' => "Erreur",
            'body' => "<h2>La page demandée n'existe pas, retentez votre chance</h2>",
            'scripts' => "",
            'connected' => true,
        ));
    }

}
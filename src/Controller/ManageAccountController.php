<?php

namespace App\Controller;

use App\Entity\Person;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class ManageAccountController extends Controller
{
    /**
     * @Route("/mon-compte", name="manage_account")
     */
    public function index()
    {
        $session = new Session();
        $session->start();

        $isConnected = $session->get('isConnected');

        if($isConnected)
        {
            return $this->redirectToRoute('login');
        }

        $current_User = $this->getDoctrine()->getRepository(Person::class)
            ->findOneBy([
                    'pseudo' => $session->get('pseudo'),
                ]
            );

        return $this->render('account.html.twig', array(
            'title' => "Mon compte",
            'body' => "Voici les informations de votre compte",
            'connected' => $isConnected,
            'current_User' => $current_User,
        ));

    }
}

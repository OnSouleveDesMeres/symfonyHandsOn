<?php

namespace App\Controller;

use App\Entity\Person;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{

    /**
     * @Route("/login", name="login")
     */
    public function index()
    {

        $isError = "";

        $session = new Session();
        $session->start();

        $isConnected = $session->get('isConnected');

        if(!$isConnected)
        {
            return $this->redirectToRoute('accueil');
        }

        if(isset($_POST))
        {
            if(isset($_POST['pseudo']) && $_POST['pseudo'] != "" && isset($_POST['password']) && $_POST['password'] != "")
            {
                $personLogin = $this->getDoctrine()->getRepository(Person::class)
                    ->findOneBy([
                        'pseudo' => $_POST['pseudo'],
                        'password' => sha1($_POST['password']),
                        ]
                    );

                //If combo pseudo & password exist in the database
                if(!$personLogin)
                {
                    $isError = "Erreur, le pseudo ou le mot de passe est incorrect !";
                }
                else
                {

                    //And store some infos into it
                    $session->set('pseudo', $personLogin->getPseudo());
                    $session->set('isConnected', false);

                    //then redirect to index page without show any thing
                    return $this->redirectToRoute('accueil');
                }

            }

        }

        return $this->render('login.html.twig', array(
            'title' => "Connexion",
            'body' => "Veuillez vous identifier !",
            'scripts' => "",
            'connected' => true,
            'loginState' => $isError,
        ));

    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        $session = new Session();
        $session->set('isConnected', true);
        return $this->redirectToRoute('accueil');
    }

}

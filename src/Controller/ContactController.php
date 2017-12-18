<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class ContactController extends Controller
{
    /**
     * @Route("/me-contacter", name="contact")
     */
    public function index(\Swift_Mailer $mailer)
    {

        $isMailSent = false;

        $session = new Session();
        $session->start();

        $isConnected = $session->get('isConnected');

        if($isConnected){
            $this->redirectToRoute('accueil');
        }

        if(isset($_POST)){
            if(isset($_POST['username']) && isset($_POST['userfirstname']) && isset($_POST['usermail']) && isset($_POST['description'])){

                $isMailSent = true;

                $message = (new \Swift_Message('Hello Email'))
                    ->setFrom('sylvaincombraquemailservice@gmail.com')
                    ->setTo('sylvaincombraque@hotmail.fr')
                    ->setBody(
                        $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                            'mail.html.twig'
                        ),
                        'text/html'
                    )
                    /*
                     * If you also want to include a plaintext version of the message
                    ->addPart(
                        $this->renderView(
                            'Emails/registration.txt.twig',
                            array('name' => $name)
                        ),
                        'text/plain'
                    )
                    */
                ;

                $mailer->send($message);

            }
        }

        return $this->render('contact.html.twig', array(
            'title' => "Me contacter",
            'body' => "Contactez-moi en remplissant le formulaire suivant",
            'connected' => $isConnected,
            'isMailSent' => $isMailSent,
        ));
    }
}

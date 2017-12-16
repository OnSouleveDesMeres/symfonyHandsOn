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

        if(isset($_POST)){
            if(isset($_POST['username']) && isset($_POST['userfirstname']) && isset($_POST['email']) && isset($_POST['description'])){
                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 25))
                    ->setUsername('compte.asfeld@gmail.com')
                    ->setPassword('6edb53506f062ec8b774f30fcd6dea3fd376a713')
                ;

// Create the Mailer using your created Transport
                $mailer = new Swift_Mailer($transport);

// Create a message
                $message = (new Swift_Message('Wonderful Subject'))
                    ->setFrom(['compte.asfeld@gmail.com' => 'Compte'])
                    ->setTo(['sylvaincombraque@hotmail.fr' => 'Sylvain COMBRAQUE'])
                    ->setBody('Hello test')
                ;

// Send the message
                $mailer->send($message);
            }
        }

        return $this->render('contact.html.twig', array(
            'title' => "Me contacter",
            'body' => "Contactez-moi en remplissant le formulaire suivant",
            'connected' => true,
        ));
    }
}

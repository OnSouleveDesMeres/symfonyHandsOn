<?php

namespace App\Controller;

use App\Entity\GoldenBook;
use App\Entity\Person;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CreateGoldenController extends Controller
{
    /**
     * @Route("/donnez-votre-avis", name="create_golden")
     */
    public function index()
    {

        $session = new Session();
        $session->start();

        $isConnected = $session->get('isConnected');

        $isInserted = false;

        if(isset($_POST['avis']) && $_POST['avis'] != "")
        {
            $isInserted = true;

            $createGolden = new GoldenBook();

            $currentUser = $this->getDoctrine()->getRepository(Person::class)
                ->findOneBy([
                        'pseudo' => $session->get('pseudo'),
                    ]
                );

            $createGolden->setAuthor($currentUser);
            $createGolden->setContent($_POST['avis']);
            $createGolden->setPublishedDate(date_create_from_format("Y-m-d", date("Y-m-d")));

            $entity = $this->getDoctrine()->getManager();

            $entity->persist($createGolden);

            $entity->flush();
        }

        return $this->render('create.golden.html.twig', array(
            'title' => "Votre avis m'intéresse",
            'body' => "Donnez votre avis ci-dessous",
            'connected' => $isConnected,
            'is_inserted' => $isInserted,
        ));
    }
}

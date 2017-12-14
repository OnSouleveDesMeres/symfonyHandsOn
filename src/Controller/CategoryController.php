<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Competences;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        $categoryList = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        $res = "";

        foreach ($categoryList as $catg)
        {
            $res .= "<li>{$catg->getLabel()}</li><ul>";

            $competences = $this->getDoctrine()
                ->getRepository(Competences::class)
                ->findByCategory($catg->getId());

            foreach ($competences as $c)
            {
                $res .= "<li>{$c->getLabel()}</li>";
            }

            $res .= "</ul>";
        }

        return $this->render('competences.html.twig', array(
            'title' => "Contactez-nous",
            'body' => "Voici mes différentes compétences",
            'scripts' => "",
            'connected' => true,
            'competences' => $res,
        ));

    }

}

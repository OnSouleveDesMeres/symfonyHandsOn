<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Competences;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CompetencesController extends Controller
{
    /**
     * @Route("/mes-competences", name="competences")
     */
    public function index()
    {
        $categoryList = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        $res = "";

        foreach ($categoryList as $catg)
        {
            $res .= "<table class='col-sm-12 table text-center'><thead class='thead-dark'><tr class='col-sm-12'><th colspan='3' class='col-sm-12'><h2>-- {$catg->getLabel()} --</h2></th></tr></thead><tr>";

            $competences = $this->getDoctrine()
                ->getRepository(Competences::class)
                ->findByCategory($catg->getId());

            $countingRows = 0;

            foreach ($competences as $c)
            {
                if (($countingRows % 3) == 0)
                {
                    $res .= "</tr><tr class='competencesRows'>";
                }
                $countingRows++;
                $res .= "<td style='width: 33%'><a href='{$c->getLink()}'>{$c->getLabel()}</a></td>";
            }

            $res .= "</tr></table>";
        }

        return $this->render('competences.html.twig', array(
            'title' => "Mes compétences",
            'body' => "Voici les différentes compétences que j'ai pu acquérir au fil de mes années d'études",
            'scripts' => "",
            'connected' => true,
            'competencesList' => $res,
        ));
    }

}

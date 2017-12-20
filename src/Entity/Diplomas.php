<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiplomasRepository")
 */
class Diplomas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="date")
     */
    private $obtainDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $valide;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkToCity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkToSchool;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cp;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getObtainDate()
    {
        return $this->obtainDate;
    }

    /**
     * @param mixed $obtainDate
     */
    public function setObtainDate($obtainDate)
    {
        $this->obtainDate = $obtainDate;
    }

    /**
     * @return mixed
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * @param mixed $valide
     */
    public function setValide($valide)
    {
        $this->valide = $valide;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLinkToCity()
    {
        return $this->linkToCity;
    }

    /**
     * @param mixed $linkToCity
     */
    public function setLinkToCity($linkToCity)
    {
        $this->linkToCity = $linkToCity;
    }

    /**
     * @return mixed
     */
    public function getLinkToSchool()
    {
        return $this->linkToSchool;
    }

    /**
     * @param mixed $linkToSchool
     */
    public function setLinkToSchool($linkToSchool)
    {
        $this->linkToSchool = $linkToSchool;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }



}

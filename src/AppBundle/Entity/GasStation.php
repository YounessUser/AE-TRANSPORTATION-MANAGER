<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * GasStation
 *
 * @ORM\Table(name="gas_station")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GasStationRepository")
 */
class GasStation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var FuelReconciliation[] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FuelReconciliation", mappedBy="gasStation")
     */
    private $reconciliations;

    /**
     * @return mixed
     */
    public function getReconciliations()
    {
        return $this->reconciliations;
    }

    /**
     * @param mixed $reconciliations
     */
    public function setReconciliations($reconciliations)
    {
        $this->reconciliations = $reconciliations;
    }



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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


}


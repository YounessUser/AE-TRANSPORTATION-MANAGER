<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FuelReconciliation
 *
 * @ORM\Table(name="fuel_reconciliation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FuelReconciliationRepository")
 */
class FuelReconciliation
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
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="float")
     * @Assert\Type( type="float")
     */
    private $liters;

    /**
     * @ORM\Column(type="float")
     * @Assert\Type( type="float")
     */
    private $tauxByLiter;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Type( type="boolean")
     *
     */
    private $isPayed;

    /**
     * @ORM\Column(type="float")
     * @Assert\Type( type="float")
     */
    private $amount;


    /**
     * @var Department | Department
     *
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Department", inversedBy="reconciliations")
     */
    private $department;

    /**
     * @var Driver | Driver
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Driver", inversedBy="reconciliations")
     */
    private $driver;


    /**
     * @var GasStation | GasStation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GasStation", inversedBy="reconciliations")
     */
    private $gasStation;

    /**
     * @var Project | Project
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", inversedBy="reconciliations")
     */
    private $project;

    /**
     * @var User | User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="reconciliations")
     */
    private $user;

    /**
     * @var Vehicle | Vehicle
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vehicle", inversedBy="reconciliations")
     */
    private $vehicle;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $remarks;



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
     * @return Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param Department $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return Driver
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param Driver $driver
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return GasStation
     */
    public function getGasStation()
    {
        return $this->gasStation;
    }

    /**
     * @param GasStation $gasStation
     */
    public function setGasStation($gasStation)
    {
        $this->gasStation = $gasStation;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @param Vehicle $vehicle
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
    }



    /**
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getLiters()
    {
        return $this->liters;
    }

    /**
     * @param mixed $liters
     */
    public function setLiters($liters)
    {
        $this->liters = $liters;
    }

    /**
     * @return mixed
     */
    public function getTauxByLiter()
    {
        return $this->tauxByLiter;
    }

    /**
     * @param mixed $tauxByLiter
     */
    public function setTauxByLiter($tauxByLiter)
    {
        $this->tauxByLiter = $tauxByLiter;
    }

    /**
     * @return mixed
     */
    public function isPayed()
    {
        return $this->isPayed;
    }

    /**
     * @param mixed $isPayed
     */
    public function setIsPayed($isPayed)
    {
        $this->isPayed = $isPayed;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @param mixed $remarks
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
    }



}


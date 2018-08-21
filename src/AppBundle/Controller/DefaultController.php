<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{

	/**
	*@Route("/", name="__homepage")
	*/
   public function index()
   {

   	return $this->redirectToRoute('fuelreconciliation_search',[]);
   }
}

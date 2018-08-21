<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FuelReconciliation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fuelreconciliation controller.
 *
 * @Route("fuelreconciliation")
 */
class FuelReconciliationController extends Controller
{
    /**
     * Lists all fuelReconciliation entities.
     *
     * @Route("/", name="fuelreconciliation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fuelReconciliations = $em->getRepository('AppBundle:FuelReconciliation')->findAll();

        return $this->render('fuelreconciliation/index.html.twig', array(
            'fuelReconciliations' => $fuelReconciliations,
        ));
    }

    /**
     * search all fuelReconciliation entities.
     *
     * @Route("/search", name="fuelreconciliation_search")
     * @Method("GET")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm('AppBundle\Form\SearchReconciliationType');
        $form->handleRequest($request);
        $list = [];
        $subTotals = [];
        $total = 0;
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $driverID = ($data['driver'] !== null)?$data['driver']->getId():0;
            $vehicleID = ($data['vehicle'] !== null)?$data['vehicle']->getId():0;
            $departmentID = ($data['department'] !== null)?$data['department']->getId():0;
            $projectID = ($data['project'] !== null)?$data['project']->getId():0;
            $firstDate = ($data['firstDate'] !== null)?$data['firstDate']:new \DateTime();
            $secondDate = ($data['secondDate'] !== null)?$data['secondDate']:new \DateTime();
            $list = $em->getRepository('AppBundle:FuelReconciliation')
                ->getReconciliations($driverID,$vehicleID,$departmentID,$projectID,$firstDate,$secondDate);
            $subTotals = $em->getRepository('AppBundle:FuelReconciliation')->getSubTotals();
            $total = $em->getRepository('AppBundle:FuelReconciliation')->getTotal();

        }

        return $this->render('fuelreconciliation/search.html.twig', array(
            'form' => $form->createView(),
            'list' => $list,
            'subTotals' => $subTotals,
            'total' => $total
        ));
    }

    /**
     * Creates a new fuelReconciliation entity.
     *
     * @Route("/new", name="fuelreconciliation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fuelReconciliation = new Fuelreconciliation();
        $form = $this->createForm('AppBundle\Form\FuelReconciliationType', $fuelReconciliation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fuelReconciliation->setDateCreation(new \DateTime());
            $fuelReconciliation->setIsPayed(true);
            $fuelReconciliation->setAmount($fuelReconciliation->getLiters()*$fuelReconciliation->getTauxByLiter());


            $em = $this->getDoctrine()->getManager();
            $em->persist($fuelReconciliation);
            $em->flush();

            return $this->redirectToRoute('fuelreconciliation_show', array('id' => $fuelReconciliation->getId()));
        }

        return $this->render('fuelreconciliation/new.html.twig', array(
            'fuelReconciliation' => $fuelReconciliation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fuelReconciliation entity.
     *
     * @Route("/{id}", name="fuelreconciliation_show")
     * @Method("GET")
     */
    public function showAction(FuelReconciliation $fuelReconciliation)
    {
        $deleteForm = $this->createDeleteForm($fuelReconciliation);

        return $this->render('fuelreconciliation/show.html.twig', array(
            'fuelReconciliation' => $fuelReconciliation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fuelReconciliation entity.
     *
     * @Route("/{id}/edit", name="fuelreconciliation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FuelReconciliation $fuelReconciliation)
    {
        $deleteForm = $this->createDeleteForm($fuelReconciliation);
        $editForm = $this->createForm('AppBundle\Form\FuelReconciliationType', $fuelReconciliation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fuelreconciliation_edit', array('id' => $fuelReconciliation->getId()));
        }

        return $this->render('fuelreconciliation/edit.html.twig', array(
            'fuelReconciliation' => $fuelReconciliation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fuelReconciliation entity.
     *
     * @Route("/{id}", name="fuelreconciliation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FuelReconciliation $fuelReconciliation)
    {
        $form = $this->createDeleteForm($fuelReconciliation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fuelReconciliation);
            $em->flush();
        }

        return $this->redirectToRoute('fuelreconciliation_index');
    }

    /**
     * Creates a form to delete a fuelReconciliation entity.
     *
     * @param FuelReconciliation $fuelReconciliation The fuelReconciliation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FuelReconciliation $fuelReconciliation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fuelreconciliation_delete', array('id' => $fuelReconciliation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

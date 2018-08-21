<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GasStation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Gasstation controller.
 *
 * @Route("gasstation")
 */
class GasStationController extends Controller
{
    /**
     * Lists all gasStation entities.
     *
     * @Route("/", name="gasstation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gasStations = $em->getRepository('AppBundle:GasStation')->findAll();

        return $this->render('gasstation/index.html.twig', array(
            'gasStations' => $gasStations,
        ));
    }

    /**
     * Creates a new gasStation entity.
     *
     * @Route("/new", name="gasstation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $gasStation = new Gasstation();
        $form = $this->createForm('AppBundle\Form\GasStationType', $gasStation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gasStation);
            $em->flush();

            return $this->redirectToRoute('gasstation_show', array('id' => $gasStation->getId()));
        }

        return $this->render('gasstation/new.html.twig', array(
            'gasStation' => $gasStation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gasStation entity.
     *
     * @Route("/{id}", name="gasstation_show")
     * @Method("GET")
     */
    public function showAction(GasStation $gasStation)
    {
        $deleteForm = $this->createDeleteForm($gasStation);

        return $this->render('gasstation/show.html.twig', array(
            'gasStation' => $gasStation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gasStation entity.
     *
     * @Route("/{id}/edit", name="gasstation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GasStation $gasStation)
    {
        $deleteForm = $this->createDeleteForm($gasStation);
        $editForm = $this->createForm('AppBundle\Form\GasStationType', $gasStation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gasstation_edit', array('id' => $gasStation->getId()));
        }

        return $this->render('gasstation/edit.html.twig', array(
            'gasStation' => $gasStation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gasStation entity.
     *
     * @Route("/{id}", name="gasstation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GasStation $gasStation)
    {
        $form = $this->createDeleteForm($gasStation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gasStation);
            $em->flush();
        }

        return $this->redirectToRoute('gasstation_index');
    }

    /**
     * Creates a form to delete a gasStation entity.
     *
     * @param GasStation $gasStation The gasStation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GasStation $gasStation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gasstation_delete', array('id' => $gasStation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

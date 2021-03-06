<?php

namespace App\Controller;

use App\Entity\Element;
use App\Form\ElementPoType;
use App\Form\ElementDevNewType;
use App\Form\ElementDevEditType;
use App\Repository\ElementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/element")
 */
class ElementController extends AbstractController
{
    /**
     * @Route("/", name="element_index", methods={"GET"})
     */
    public function index(ElementRepository $elementRepository): Response
    {
        return $this->render('element/index.html.twig', [
            'elements' => $elementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/po/new", name="element_po_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $element = new Element();
        $form = $this->createForm(ElementPoType::class, $element);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($element);
            $entityManager->flush();

            return $this->redirectToRoute('backlog');
        }

        return $this->render('element/new_po.html.twig', [
            'element' => $element,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/dev/new", name="element_dev_new", methods={"GET","POST"})
     */
    public function newDev(Request $request): Response
    {
        $element = new Element();
        $form = $this->createForm(ElementDevNewType::class, $element);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $element->setState('attente');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($element);
            $entityManager->flush();

            return $this->redirectToRoute('backlog');
        }

        return $this->render('element/new_dev.html.twig', [
            'element' => $element,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/po/{id}/edit", name="element_po_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Element $element): Response
    {
        $form = $this->createForm(ElementPoType::class, $element);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('backlog', [
                'id' => $element->getId(),
            ]);
        }

        return $this->render('element/edit_po.html.twig', [
            'element' => $element,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/dev/{id}/edit", name="element_dev_edit", methods={"GET","POST"})
     */
    public function editDev(Request $request, Element $element): Response
    {
        $form = $this->createForm(ElementDevEditType::class, $element);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('backlog', [
                'id' => $element->getId(),
            ]);
        }

        return $this->render('element/edit_dev.html.twig', [
            'element' => $element,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="element_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Element $element): Response
    {
        if ($this->isCsrfTokenValid('delete'.$element->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($element);
            $entityManager->flush();
        }

        return $this->redirectToRoute('element_index');
    }
}

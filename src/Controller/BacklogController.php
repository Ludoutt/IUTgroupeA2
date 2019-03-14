<?php


// src/Controller/BacklogController.php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ElementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BacklogController extends AbstractController
{
    /**
     * @Route("/", name="backlog")
     */
    public function backlog(ElementRepository $elementRepository)
    {
        $elements_attente = $elementRepository->findBy(
            ['state' => 'attente'],
            ['position' => 'ASC']
        );

        $elements_todo = $elementRepository->findBy(
            ['state' => 'todo'],
            ['position' => 'ASC']
        );

        $elements_doing = $elementRepository->findBy(
            ['state' => 'doing'],
            ['position' => 'ASC']
        );

        $elements_done = $elementRepository->findBy(
            ['state' => 'done'],
            ['position' => 'ASC']
        );

        $elements_annule = $elementRepository->findBy(
            ['state' => 'annule'],
            ['position' => 'ASC']
        );

        dump($elements_attente);
        dump($elements_todo);
        dump($elements_doing);
        dump($elements_done);
        dump($elements_annule);

        return $this->render('backlog/backlog.html.twig', array(
            'elements_attente' => $elements_attente,
            'elements_todo' => $elements_todo,
            'elements_doing' => $elements_doing,
            'elements_done' => $elements_done,
            'elements_annule' => $elements_annule
        ));
    }

    /**
     * @Route("/desc", name="backlog_desc")
     */
    public function backlog_desc(ElementRepository $elementRepository)
    {
        $elements_attente = $elementRepository->findBy(
            ['state' => 'attente'],
            ['position' => 'DESC']
        );

        $elements_todo = $elementRepository->findBy(
            ['state' => 'todo'],
            ['position' => 'DESC']
        );

        $elements_doing = $elementRepository->findBy(
            ['state' => 'doing'],
            ['position' => 'DESC']
        );

        $elements_done = $elementRepository->findBy(
            ['state' => 'done'],
            ['position' => 'DESC']
        );

        $elements_annule = $elementRepository->findBy(
            ['state' => 'annule'],
            ['position' => 'DESC']
        );

        dump($elements_attente);
        dump($elements_todo);
        dump($elements_doing);
        dump($elements_done);
        dump($elements_annule);

        return $this->render('backlog/backlog.html.twig', array(
            'elements_attente' => $elements_attente,
            'elements_todo' => $elements_todo,
            'elements_doing' => $elements_doing,
            'elements_done' => $elements_done,
            'elements_annule' => $elements_annule
        ));
    }
}
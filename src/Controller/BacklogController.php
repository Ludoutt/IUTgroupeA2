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
            ['state' => 'attente']
        );

        $elements_todo = $elementRepository->findBy(
            ['state' => 'todo']
        );

        $elements_doing = $elementRepository->findBy(
            ['state' => 'doing']
        );

        $elements_done = $elementRepository->findBy(
            ['state' => 'done']
        );

        dump($elements_attente);
        dump($elements_todo);
        dump($elements_doing);
        dump($elements_done);

        return $this->render('backlog/backlog.html.twig', array(
            'elements_attente' => $elements_attente,
            'elements_todo' => $elements_todo,
            'elements_doing' => $elements_doing,
            'elements_done' => $elements_done
        ));
    }
}
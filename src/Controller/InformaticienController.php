<?php

namespace App\Controller;

use App\Entity\Informaticien;
use App\Form\InformaticienType;
use App\Repository\InformaticienRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/informaticien')]
class InformaticienController extends AbstractController
{
    #[Route('/', name: 'app_informaticien_index', methods: ['GET'])]
    public function index(InformaticienRepository $informaticienRepository): Response
    {
        return $this->render('informaticien/index.html.twig', [
            'informaticiens' => $informaticienRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_informaticien_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $informaticien = new Informaticien();
        $form = $this->createForm(InformaticienType::class, $informaticien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($informaticien);
            $entityManager->flush();

            return $this->redirectToRoute('app_informaticien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('informaticien/new.html.twig', [
            'informaticien' => $informaticien,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_informaticien_show', methods: ['GET'])]
    public function show(Informaticien $informaticien): Response
    {
        return $this->render('informaticien/show.html.twig', [
            'informaticien' => $informaticien,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_informaticien_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Informaticien $informaticien, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InformaticienType::class, $informaticien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_informaticien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('informaticien/edit.html.twig', [
            'informaticien' => $informaticien,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_informaticien_delete', methods: ['POST'])]
    public function delete(Request $request, Informaticien $informaticien, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$informaticien->getId(), $request->request->get('_token'))) {
            $entityManager->remove($informaticien);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_informaticien_index', [], Response::HTTP_SEE_OTHER);
    }
}

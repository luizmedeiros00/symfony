<?php

namespace App\Controller;

use App\Entity\Endereco;
use App\Form\EnderecoType;
use App\Repository\EnderecoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/endereco")
 */
class EnderecoController extends AbstractController
{
    /**
     * @Route("/", name="endereco_index", methods={"GET"})
     */
    public function index(EnderecoRepository $enderecoRepository): Response
    {
        return $this->render('endereco/index.html.twig', [
            'enderecos' => $enderecoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="endereco_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $endereco = new Endereco();
        $form = $this->createForm(EnderecoType::class, $endereco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($endereco);
            $entityManager->flush();

            return $this->redirectToRoute('endereco_index');
        }

        return $this->render('endereco/new.html.twig', [
            'endereco' => $endereco,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="endereco_show", methods={"GET"})
     */
    public function show(Endereco $endereco): Response
    {
        return $this->render('endereco/show.html.twig', [
            'endereco' => $endereco,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="endereco_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Endereco $endereco): Response
    {
        $form = $this->createForm(EnderecoType::class, $endereco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('endereco_index');
        }

        return $this->render('endereco/edit.html.twig', [
            'endereco' => $endereco,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="endereco_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Endereco $endereco): Response
    {
        if ($this->isCsrfTokenValid('delete'.$endereco->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($endereco);
            $entityManager->flush();
        }

        return $this->redirectToRoute('endereco_index');
    }
}

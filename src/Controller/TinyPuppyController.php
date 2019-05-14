<?php

namespace App\Controller;

use App\Entity\TinyPuppy;
use App\Form\TinyPuppyType;
use App\Repository\TinyPuppyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tiny/puppy")
 */
class TinyPuppyController extends Controller
{
    /**
     * @Route("/", name="tiny_puppy_index", methods={"GET"})
     */
    public function index(TinyPuppyRepository $tinyPuppyRepository): Response
    {
        return $this->render('tiny_puppy/index.html.twig', [
            'tiny_puppies' => $tinyPuppyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tiny_puppy_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tinyPuppy = new TinyPuppy();
        $form = $this->createForm(TinyPuppyType::class, $tinyPuppy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tinyPuppy);
            $entityManager->flush();

            return $this->redirectToRoute('tiny_puppy_index');
        }

        return $this->render('tiny_puppy/new.html.twig', [
            'tiny_puppy' => $tinyPuppy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tiny_puppy_show", methods={"GET"})
     */
    public function show(TinyPuppy $tinyPuppy): Response
    {
        return $this->render('tiny_puppy/show.html.twig', [
            'tiny_puppy' => $tinyPuppy,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tiny_puppy_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TinyPuppy $tinyPuppy): Response
    {
        $form = $this->createForm(TinyPuppyType::class, $tinyPuppy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tiny_puppy_index', [
                'id' => $tinyPuppy->getId(),
            ]);
        }

        return $this->render('tiny_puppy/edit.html.twig', [
            'tiny_puppy' => $tinyPuppy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tiny_puppy_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TinyPuppy $tinyPuppy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tinyPuppy->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tinyPuppy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tiny_puppy_index');
    }
}

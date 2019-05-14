<?php

namespace App\Controller;

use App\Entity\GrumpyElephant;
use App\Form\GrumpyElephantType;
use App\Repository\GrumpyElephantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/grumpy/elephant")
 */
class GrumpyElephantController extends Controller
{
    /**
     * @Route("/", name="grumpy_elephant_index", methods={"GET"})
     */
    public function index(GrumpyElephantRepository $grumpyElephantRepository): Response
    {
        return $this->render('grumpy_elephant/index.html.twig', [
            'grumpy_elephants' => $grumpyElephantRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="grumpy_elephant_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $grumpyElephant = new GrumpyElephant();
        $form = $this->createForm(GrumpyElephantType::class, $grumpyElephant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grumpyElephant);
            $entityManager->flush();

            return $this->redirectToRoute('grumpy_elephant_index');
        }

        return $this->render('grumpy_elephant/new.html.twig', [
            'grumpy_elephant' => $grumpyElephant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grumpy_elephant_show", methods={"GET"})
     */
    public function show(GrumpyElephant $grumpyElephant): Response
    {
        return $this->render('grumpy_elephant/show.html.twig', [
            'grumpy_elephant' => $grumpyElephant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="grumpy_elephant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GrumpyElephant $grumpyElephant): Response
    {
        $form = $this->createForm(GrumpyElephantType::class, $grumpyElephant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grumpy_elephant_index', [
                'id' => $grumpyElephant->getId(),
            ]);
        }

        return $this->render('grumpy_elephant/edit.html.twig', [
            'grumpy_elephant' => $grumpyElephant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grumpy_elephant_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GrumpyElephant $grumpyElephant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grumpyElephant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($grumpyElephant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('grumpy_elephant_index');
    }
}

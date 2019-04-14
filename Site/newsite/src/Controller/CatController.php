<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Form\CatType;
use App\Repository\CatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cat")
 */
class CatController extends AbstractController
{
    /**
     * @Route("/", name="cat_index", methods={"GET"})
     */
    public function index(Request $request, CatRepository $catRepository): Response
    {
        $sort = $request->query->get('sort');
        $query = $request->query->get('query');
        $cats = $catRepository->findAll();

        if ($sort) {
            if ($sort === 'asc') {
                usort($cats, function ($a, $b) {
                    return strcmp(strtolower($a->getImya()), strtolower($b->getImya()));
                });
            } else if ($sort === 'dsc') {
                usort($cats, function ($a, $b) {
                    return -strcmp(strtolower($a->getImya()), strtolower($b->getImya()));
                });
            }
    

        }

        if ($query) {
            $cats = array_filter($cats, function ($v, $k) use ($query) {
                return strpos(strtolower($v->getImya()), strtolower($query)) !== false;
            }, ARRAY_FILTER_USE_BOTH);
        }

        // echo '<pre>'; print_r($cats); echo '</pre>'; die();

        return $this->render('cat/index.html.twig', [
            'cats' => $cats,
        ]);
    }

    /**
     * @Route("/new", name="cat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cat = new Cat();
        $form = $this->createForm(CatType::class, $cat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cat);
            $entityManager->flush();

            return $this->redirectToRoute('cat_index');
        }

        return $this->render('cat/new.html.twig', [
            'cat' => $cat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cat_show", methods={"GET"})
     */
    public function show(Cat $cat): Response
    {
        return $this->render('cat/show.html.twig', [
            'cat' => $cat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cat $cat): Response
    {
        $form = $this->createForm(CatType::class, $cat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cat_index', [
                'id' => $cat->getId(),
            ]);
        }

        return $this->render('cat/edit.html.twig', [
            'cat' => $cat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cat_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cat $cat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cat_index');
    }
}

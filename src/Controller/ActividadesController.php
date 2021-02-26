<?php

namespace App\Controller;

use App\Entity\Actividades;
use App\Form\ActividadesType;
use App\Repository\ActividadesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Component\Security\Core\Security;

/**
 * @Route("/actividades")
 */
class ActividadesController extends AbstractController
{
    /**
     * @Route("/", name="actividades_index", methods={"GET"})
     */
    public function indexAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        //Cojo todas las categorias de las actividades
        $log_name = is_null($request->getSession()->get(Security::LAST_USERNAME)) ? $request->getSession()->get('nombre') : $request->getSession()->get(Security::LAST_USERNAME);
        $actividad = $em->getRepository('App:Actividades')->findActividadesFromUsuario($log_name);
        
        return $this->render('actividades/index.html.twig', array(
            'actividad' => $actividad
        ));       
    }
    
    /**
     * @Route("/new", name="actividades_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $actividade = new Actividades();
        $form = $this->createForm(ActividadesType::class, $actividade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actividade);
            $entityManager->flush();

            return $this->redirectToRoute('actividades_index');
        }

        return $this->render('actividades/new.html.twig', [
            'actividade' => $actividade,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actividades_show", methods={"GET"})
     */
    public function show(Actividades $actividade): Response
    {
        return $this->render('actividades/show.html.twig', [
            'actividade' => $actividade,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="actividades_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Actividades $actividade): Response
    {
        $form = $this->createForm(ActividadesType::class, $actividade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actividades_index');
        }

        return $this->render('actividades/edit.html.twig', [
            'actividade' => $actividade,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="actividades_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Actividades $actividade): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actividade->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($actividade);
            $entityManager->flush();
        }

        return $this->redirectToRoute('actividades_index');
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use \App\Entity\Actividades;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $actividades = $this->getDoctrine()
                ->getRepository(Actividades::class)
                ->findAllActive();
        
        return $this->render('default/index.html.twig', array(
            'actividades' => $actividades,
        ));
    }
}

<?php

namespace App\Controller;

use App\Repository\RobotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RobotController extends AbstractController
{
    #[Route('/robot', name: 'app_robot')]
    public function index(RobotRepository $robotRepository, Request $request): Response
    {
        // On récupère dans la requete le parametre 'page' définir la page cible
        $page = $request->query->getInt('page', 1);
        // nombre d'éléments rendu
        $limit = 5;
        // requete envoyé dans le repository 
        $robots = $robotRepository->paginationRobot($page, $limit);

        return $this->render('robot/robot.html.twig', [
            'controller_name' => 'RobotController',
            'robots' => $robots,
        ]);
    }
}
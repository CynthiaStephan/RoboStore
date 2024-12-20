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
        // $robots = $robotRepository->findAll();
        $robots = $robotRepository->paginationRobot(1, 5);
        dump($robots);
        

        return $this->render('robot/robot.html.twig', [
            'controller_name' => 'RobotController',
            'robots' => $robots,
            // 'pagination' => $pagination,
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\RobotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RobotRepository $robotRepository, Request $request): Response
    {
        $robotsName = ['t-800', 'data', 'tars'];
        $robots = [];
        foreach ($robotsName as $name){
            $robots[] = $robotRepository->FindByName($name)[0];
        }
        dump($robots);
        return $this->render('home/home.html.twig', [
            'robots' => $robots
        ]);
    }
}

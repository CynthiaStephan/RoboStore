<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Robot;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(RobotCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('RoboStore');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Robots', 'fas fa-robot', Robot::class);
        yield MenuItem::linkToCrud('Caterogy', 'fas fa-tag', Category::class);
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);

    }
}

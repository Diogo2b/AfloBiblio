<?php

namespace App\Controller\Admin;


use App\Entity\Book;
use App\Entity\Emprunt;
use App\Entity\Reservation;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin_dashboard')]


    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(BookCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AfloBiblio');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Entities'),
            MenuItem::linkToCrud('Books', 'fa fa-book', Book::class),
            MenuItem::linkToCrud('Emprunts', 'fa fa-exchange-alt', Emprunt::class),
            MenuItem::linkToCrud('Reservations', 'fa fa-calendar-alt', Reservation::class),
            MenuItem::linkToCrud('Users', 'fa fa-users', User::class),
        ];
    }
}

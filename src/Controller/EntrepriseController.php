<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprisesStats', name: 'app_entreprise_stats')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entreprises = $doctrine->getRepository(Entreprise::class)->findAll();
        $stats = [];
        foreach ($entreprises as $entreprise){
            $stats[$entreprise->getName()] = $entreprise->getPfes()->count();
        }
        return $this->render('entreprise/index.html.twig', [
            'stats' => $stats
        ]);
    }
}

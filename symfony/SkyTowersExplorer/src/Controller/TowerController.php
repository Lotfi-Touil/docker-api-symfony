<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TowerRepository; // N'oubliez pas d'ajouter cette utilisation

class TowerController extends AbstractController
{
    #[Route('/', name: 'app_tower')]
    public function index(TowerRepository $towerRepository): Response
    {
        $towers = $towerRepository->findBy([], ['height' => 'DESC']); // Récupère toutes les tours, triées par hauteur décroissante

        return $this->render('tower/index.html.twig', [
            'towers' => $towers, // Passe les tours au template
        ]);
    }
}

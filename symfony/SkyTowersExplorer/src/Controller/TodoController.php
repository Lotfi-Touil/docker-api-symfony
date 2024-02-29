<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Todo;

class TodoController extends AbstractController
{
    #[Route('/todo', name: 'app_todo')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $todoRepository = $entityManager->getRepository(Todo::class);
        $todos = $todoRepository->findAll();

        return $this->render('todo/index.html.twig', [
            'todos' => $todos,
        ]);
    }

    #[Route('/api/todos', name: 'api_todos', methods: ['GET'])]
    public function getTodosApi(EntityManagerInterface $entityManager): JsonResponse
    {
        $todoRepository = $entityManager->getRepository(Todo::class);
        $todos = $todoRepository->findAll();

        $data = array_map(function ($todo) {
            return [
                'id' => $todo->getId(),
                'titre' => $todo->getTitle(),
                'done' => $todo->isDone(),
            ];
        }, $todos);

        return new JsonResponse($data);
    }
}

<?php

namespace App\UI\Rest\Controller;

use App\Application\Commands\Movement\GetAllMovements;
use App\Application\Commands\Movement\GetAllMovementsByElevator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class MovementController extends AbstractController
{
    private $getAllMovements;
    private $getAllMovementsByElevator;

    public function __construct(
        GetAllMovements $getAllMovements,
        GetAllMovementsByElevator $getAllMovementsByElevator
    )
    {
        $this->getAllMovements = $getAllMovements;
        $this->getAllMovementsByElevator = $getAllMovementsByElevator;
    }

    public function index()
    {
        $movements = "Elevators v1";

        return new JsonResponse($movements);
    }

    public function all()
    {
        $movements = $this->getAllMovements->execute();

        return $this->render('movements/movements.html.twig', [
            'movements' => $movements,
        ]);
    }

    public function findByElevator($elevator_id)
    {
        $movements = $this->getAllMovementsByElevator->execute($elevator_id);

        return $this->render('movements/movements.html.twig', [
            'movements' => $movements,
        ]);
    }
}
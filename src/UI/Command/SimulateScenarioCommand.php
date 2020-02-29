<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\UI\Command;

use App\Application\Commands\Elevator\FindClosestElevator;
use App\Application\Commands\Elevator\UpdateElevatorPosition;
use App\Application\Commands\ElevatorCall\GetAllElevatorCalls;
use App\Application\Commands\Floor\GetFloorById;
use App\Application\Commands\Movement\CreateMovement;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SimulateScenarioCommand extends Command
{
    protected static $defaultName = 'elevators:scenario:simulate';
    private $getAllElevatorCalls;
    private $findClosestElevator;
    private $createMovement;
    private $updateElevatorPosition;
    private $getFloorById;

    public function __construct(
        GetAllElevatorCalls $getAllElevatorCalls,
        FindClosestElevator $findClosestElevator,
        CreateMovement $createMovement,
        UpdateElevatorPosition $updateElevatorPosition,
        GetFloorById $getFloorById,
        $name = null
    )
    {
        $this->getAllElevatorCalls = $getAllElevatorCalls;
        $this->findClosestElevator = $findClosestElevator;
        $this->createMovement = $createMovement;
        $this->updateElevatorPosition = $updateElevatorPosition;
        $this->getFloorById = $getFloorById;

        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setDescription('Simulate propose scenario');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $calls = $this->getAllElevatorCalls->execute();

        foreach ($calls as $call){
            $io->writeln(
                sprintf(
                    "Elevator call (%s - %s)",
                    $call->getOrigin(),$call->getDestiny()
                )
            );
            $origin = $call->getOrigin();
            $originFloor = $this->getFloorById->execute($origin);
            $destination = $call->getDestiny();
            $elevator = $this->findClosestElevator->execute($originFloor);
            try {
                $this->createMovement->execute($elevator, $call);
                $this->updateElevatorPosition->execute($elevator, $destination);
            } catch (\Exception $e){
                $io->error($e->getMessage());
            }
        }
    }
}
<?php

namespace App\DataFixtures;

use App\Domain\Entity\ElevatorCall\ElevatorCall;
use App\Domain\Entity\Elevator\Elevator;
use App\Domain\Entity\Floor\Floor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
         $elevators = $this->loadElevators($manager);
         $floorsIds = $this->loadFloors($manager);
         $this->LoadElevatorCalls($manager,$floorsIds);

    }

    private function loadElevators(ObjectManager $manager)
    {
        $elevatorsArray = [
            [
                'name' => 'Elevator1',
                'position' => 0
            ],
            [
                'name' => 'Elevator2',
                'position' => 0
            ],
            [
                'name' => 'Elevator3',
                'position' => 0
            ]
        ];

        $elevators = array();
        foreach ($elevatorsArray as $elevator){
            try {
                $elevator = new Elevator($elevator['name'], $elevator['position']);
                $manager->persist($elevator);
                array_push($elevators, $elevator);
            } catch (\Exception $e){
                echo $e->getMessage();
            }
        }
        $manager->flush();
        return $elevators;
    }

    private function loadFloors(ObjectManager $manager)
    {
        $floorsArray = [
            [
                'name' => 'PB',
                'value' => 0
            ],
            [
                'name' => 'P1',
                'value' => 1
            ],
            [
                'name' => 'P2',
                'value' => 2
            ],
            [
                'name' => 'P3',
                'value' => 3
            ],
        ];

        $floorsIds = array();
        foreach ($floorsArray as $floor){
            try {
                $floor = new Floor($floor['name'], $floor['value']);
                $manager->persist($floor);
                $manager->flush();
                array_push($floorsIds, $floor->getId());
            } catch (\Exception $e){
                echo $e->getMessage();
            }
        }
        return $floorsIds;
    }

    private function LoadElevatorCalls(ObjectManager $manager, $floorsIds){
        //Case 1
        $this->addSingleElevatorCall($manager,'09:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:05:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:10:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:15:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:25:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:30:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:35:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:45:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:50:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'09:55:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:05:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:10:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:15:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:25:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:30:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:35:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:45:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:50:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'10:55:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'11:00:00',$floorsIds[0],$floorsIds[2]);

        //Case 2
        $this->addSingleElevatorCall($manager,'09:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:05:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:10:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:15:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:25:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:30:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:35:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:45:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:50:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'09:55:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:05:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:10:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:15:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:25:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:30:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:35:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:45:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:50:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'10:55:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'11:00:00',$floorsIds[0],$floorsIds[3]);

        //Case 3
        $this->addSingleElevatorCall($manager,'09:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'09:10:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'09:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'09:30:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'09:40:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'09:50:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'10:00:00',$floorsIds[0],$floorsIds[1]);

        //Case 4
        $this->addSingleElevatorCall($manager,'11:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'11:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'11:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'11:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'11:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'11:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'11:40:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'11:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'11:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'12:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'12:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'12:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'12:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'12:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'12:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'12:40:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'12:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'12:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'13:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'13:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'13:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'13:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'13:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'13:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'13:40:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'13:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'13:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'14:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'14:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'14:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'14:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'14:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'14:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'14:40:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'14:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'14:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'15:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:40:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'15:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'16:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'16:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'16:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'16:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'16:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'16:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'16:40:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'16:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'16:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'17:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'17:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'17:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'17:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'17:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'17:20:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'17:40:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'17:40:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'17:40:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'18:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'18:00:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'18:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'18:20:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'18:20:00',$floorsIds[0],$floorsIds[2]);
        $this->addSingleElevatorCall($manager,'18:20:00',$floorsIds[0],$floorsIds[3]);

        //Case 5
        $this->addSingleElevatorCall($manager,'14:00:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:00:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:00:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:04:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:04:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:04:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:08:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:08:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:08:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:12:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:12:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:12:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:16:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:16:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:16:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:20:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:20:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:20:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:24:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:24:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:24:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:28:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:28:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:28:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:32:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:32:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:32:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:36:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:36:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:36:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:40:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:40:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:40:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:44:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:44:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:44:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:48:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:48:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:48:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:52:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:52:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:52:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:56:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:56:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'14:56:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[1],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[3],$floorsIds[0]);

        //Case 6
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:07:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:07:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:14:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:14:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:21:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:21:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:28:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:28:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:35:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:35:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:42:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:42:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:49:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:49:00',$floorsIds[3],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:56:00',$floorsIds[2],$floorsIds[0]);
        $this->addSingleElevatorCall($manager,'15:56:00',$floorsIds[3],$floorsIds[0]);

        //Case 7
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:00:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:07:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:07:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:14:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:14:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:21:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:21:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:28:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:28:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:35:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:35:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:42:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:42:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:49:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:49:00',$floorsIds[0],$floorsIds[3]);
        $this->addSingleElevatorCall($manager,'15:56:00',$floorsIds[0],$floorsIds[1]);
        $this->addSingleElevatorCall($manager,'15:56:00',$floorsIds[0],$floorsIds[3]);
        $manager->flush();
    }

    private function addSingleElevatorCall(ObjectManager $manager,$time,$origin,$destiny){
        try{
            $elevator_call = new ElevatorCall($time,$origin,$destiny);
            $manager->persist($elevator_call);
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}

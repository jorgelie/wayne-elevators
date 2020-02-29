# Wayne Building Elevators by Jorge Escalante
This project was made with PHP v7.1.3 with Symfony 4
The main goal was to create a report of the usage of the elevators. 
### Installation
Requirements:
- PHP 7.1+

Steps:
- Download/Clone project.
- composer install
- bin/console doctrine:migrations:migrate
 
### Usage
This project was created in order to match a real environment. You can add as much as elevators and floors as you need to simulate your scenario. Also, its algorithm ensure that you wait the minimum time by finding the closest elevator to your floor.

## Simulate given scenario
The building contains 3 elevators and 4 floors, with a predefined elevator calls pattern. To apply fixtures, run the following command:
```sh
$ bin/console doctrine:fixtures:load
```
Now to run the simulation, run the following command:
```sh
$ bin/console elevators:scenario:simulate
```
To see all report go to:
```
<path-to-project>/index.php/movements/all 
```
For a specific elevator report go to:
```
<path-to-project>/index.php/movements/{id} where id is the id of the elevator
```
## More about this project
- This project was created following a DDD architechture to ensure scalability and easy maintenance.
- In the report, bootstrap and twig was used to display a simple table with the movements records.

Jorge Escalante Salaya
essajole@gmail.com
https://jorgelie.github.io/
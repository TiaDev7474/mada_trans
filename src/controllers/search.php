<?php
namespace Application\Controllers\Search;

use Application\Config\Database\DatabaseConnection;
use Application\Model\Car\CarRepository;

require_once('src/config/database.php');
require_once('src/model/car/search.php');


class Search
{

    public static function execute($criteria): void
    {

        $connection = new DatabaseConnection();

        $carRepository = new CarRepository();

        $carRepository->connection = $connection;
        // var_dump($carRepository);
        $matchedCars = $carRepository->getMatchedCars($criteria);

        require('templates/reservation.php');
    }
}


?>
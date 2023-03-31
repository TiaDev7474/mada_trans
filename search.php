<?php
use Application\Config\Database\DatabaseConnection;
use Application\Model\Car\CarRepository;

require_once('src/config/database.php');
require_once('src/model/car/search.php');

$data = $_GET;
$connection = new DatabaseConnection();
$carRepository = new CarRepository();
$carRepository->connection = $connection;

$matchedCars = $carRepository->getMatchedCars($data);

echo json_encode($matchedCars);


?>
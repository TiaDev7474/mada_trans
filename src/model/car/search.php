<?php

namespace Application\Model\Car;

use Application\Config\Database\DatabaseConnection;


class Car
{
    public string $carId;
    public string $design;
    public int $nbr_place;
    public int $frais;

    public array $place;

    public function __construct($car, $place)
    {
        $this->carId = $car['id_voit'];
        $this->design = $car['design'];
        $this->nbr_place = $car['nbr_place'];
        $this->frais = $car['frais'];
        $this->place = $place;
    }

}
;

class CarRepository
{
    public DatabaseConnection $connection;

    public function getMatchedCars($trip_criteria): array
    {
        $query = "SELECT * FROM `voiture` V WHERE V.id_voit in (SELECT id_voit FROM departure D WHERE (D.ville_dep=:departure AND D.ville_arrivé=:arrival AND Date(D.date_dep)=:date))";
        $params = [
            'departure' => $trip_criteria['departure'],
            'arrival' => $trip_criteria['arrival'],
            'date' => $trip_criteria['date']

        ];
        if (!empty($_GET['category'])) {
            $query .= " AND V.type =:category";
            $params['category'] = strtolower($_GET['category']);
        }

        // var_dump($query);
        $carsStatement = $this->connection->getConnection()->prepare($query);
        $placeStatement = $this->connection->getConnection()->prepare('SELECT place,occupation  FROM place WHERE id_voit=?');

        $carsStatement->execute($params);

        $cars = [];
        while ($row = $carsStatement->fetch()) {
            $placeStatement->execute([$row['id_voit']]);
            $place = $placeStatement->fetchAll();
            $car = new Car($row, $place);
            $cars[] = $car;

        }
        ;
        return $cars;

    }
}


?>
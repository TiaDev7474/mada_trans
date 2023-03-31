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
    public $date;

    public function __construct($car, $place, $date)
    {
        $this->carId = $car['id_voit'];
        $this->design = $car['design'];
        $this->nbr_place = $car['nbr_place'];
        $this->date = $date;
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
        if (!empty($trip_criteria['category']) && $trip_criteria['category'] !== 'Tous') {
            $query .= " AND V.type =:category";
            $params['category'] = strtolower($trip_criteria['category']);
        }

        // var_dump($query);
        $carsStatement = $this->connection->getConnection()->prepare($query);
        $placeStatement = $this->connection->getConnection()->prepare('SELECT place,occupation FROM place WHERE id_voit=?');
        $dateStatement = $this->connection->getConnection()->prepare("SELECT DATE_FORMAT(date_dep, ' %Hh%imin') AS date FROM departure WHERE id_voit=?");
        $carsStatement->execute($params);

        $cars = [];
        while ($row = $carsStatement->fetch()) {
            $placeStatement->execute([$row['id_voit']]);
            $dateStatement->execute([$row['id_voit']]);
            $place = $placeStatement->fetchAll();
            // var_dump($place);
            $date = $dateStatement->fetch();
            $car = new Car($row, $place, $date);
            $cars[] = $car;

        }
        ;
        return $cars;

    }
}


?>
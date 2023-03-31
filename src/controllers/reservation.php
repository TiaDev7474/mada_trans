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
    public static function radio(string $name, string $value, array $data): string
    {
        $attributes = '';
        $class = 'text-main_text_color';
        if (isset($data[$name]) && $data[$name] === $value) {
            $attributes .= 'checked';

        }
        return <<<HTML
               
               <input type='radio' name=$name value=$value $attributes/>
               <label class=$class>$value</label>
          HTML;

    }
    public static function Customcheckbox(string $name, array $place)
    {

        $class = " py-2 text-main_text_color text-center ";
        if ($place['occupation'] === 1) {
            $class .= "bg-btnsecondary";
        } else {
            $class .= "border border-btnprimary";
        }

        $value = $place['place'];

        return <<<HTML
               <div class="$class" id="$name">
                     $value
               </div>
              
          HTML;
    }

    public static function countAvailablePlace(array $place): string
    {
        $count = 0;
        for ($i = 0; $i < count($place); $i++) {
            if ($place[$i]['occupation'] === 0) {
                $count++;
            }
        }
        $text = $count > 1 ? "places disponibles" : "place disponible";
        return "$count $text";
    }
}


?>
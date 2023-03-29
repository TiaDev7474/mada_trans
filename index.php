<?php

require_once('src/controllers/search.php');
require_once('src/controllers/homepage.php');

use Application\Controllers\Search\Search;
use Application\Controllers\Home\Homepage;


try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {

        if ($_GET['action'] = 'search') {


            if (!empty($_GET['departure']) && !empty($_GET['arrival']) && !empty($_GET['date'])) {

                Search::execute($_GET);

            } else {
                throw new Exception('You must be fullfilled all the information field');
            }
        }

    } else {
        Homepage::execute();
    }


} catch (Exception $e) {
    throw new Exception('Erreur:' . $e->getMessage());
}
<?php
use Application\Controllers\Search\Search;

$title = 'Reseravation'
    ?>

<?php ob_start(); ?>
<div class="w-full min-h-screen  bg-mainbgColor  h-[100vh]">
    <?php require('./components/nav.php'); ?>
    <div class="w-full mt-4  md:w-[80%] lg:w-[90%] m-auto px-2  shadow-2xl py-5  " style="background-color:#121212 ;">
        <form action="?action=search" method=" GET">
            <div class="flex justify-between lg:justify-around items-center w-full flex-wrap">
                <input type='text' name='action' class="hidden" value='search' />
                <div class="relative flex flex-col mb-2 w-[45%] md:w-[45%] lg:w-[25%]">
                    <label for='departure' class="font-bold text-gray-700 mb-2 ">Departure</label>
                    <input name='departure' id="departure" value="<?php echo htmlentities($_GET['departure']); ?>"
                        class="w-full  border border-gray-800 rounded-lg bg-[#09090936]  text-main_text_color text-[14px] focus:outline-none py-3 px-3 mt-2"
                        type=text value='' placeholder="Choisir une ville depart " />
                    <div class=" hidden absolute top-[90px] bg-white z-20 left-0 w-full " id="select_city_departure">
                        <?php
                        $city = ['Antananarivo', 'Fianarantsoa', 'Toamasina', 'Mahajanga', 'Antsirabe', 'Toliara'];
                        foreach ($city as $city_name) {
                            echo "<div class='option_item_dep cursor-pointer'>
                                $city_name</div>";
                        }
                        ;
                        ?>
                    </div>
                </div>
                <div class="relative flex flex-col mb-2 w-[45%] md:w-[45%] lg:w-[25%]">
                    <label for='arrival' class="font-bold text-gray-700 mb-2">Arrival</label>
                    <input id="arrival" name='arrival' value="<?php echo htmlentities($_GET['arrival']); ?>"
                        class="w-full  border border-gray-800 rounded-lg bg-[#09090936] text-main_text_color text-[14px] focus:outline-none py-3 px-3 mt-2"
                        type=text value='' placeholder="Choisir une ville de destination" />
                    <div class=" hidden absolute top-[90px] bg-white z-20 left-0 w-full " id="select_city_arrival">
                        <?php
                        $city = ['Antananarivo', 'Fianarantsoa', 'Toamasina', 'Mahajanga', 'Antsirabe', 'Toliara'];
                        foreach ($city as $city_name) {
                            echo "<div class='option_item_arv cursor-pointer'>
                                $city_name</div>";
                        }
                        ;
                        ?>
                    </div>
                </div>
                <div class="w-full lg:w-[25%]">
                    <label for="date" class="block text-gray-700 font-bold mb-2 ">Date</label>
                    <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?> "
                        value="<?php echo htmlentities($_GET['date']); ?>"
                        class="w-full  border  border-gray-800 rounded-lg bg-[#09090936] text-main_text_color text-[14px] focus:outline-none py-3 px-3 mt-2 mb-2" />
                </div>
                <button type='submit'
                    class="bg-btnsecondary flex justify-center items-center px-5 py-3 mt-6 w-full gap-2 lg:w-auto hover:opacity-95">
                    <span class="font-semibold text-main_text_color lg:hidden">RECHERCHER</span>
                    <img src='assets/images/Search.svg' />
                </button>
            </div>
        </form>
    </div>
    <div class=" w-full md:w-[80%] lg:w-[90%] h-[70vh] m-auto flex justify-around mt-2">
        <div class="w-[20%] px-3 py-2 " style="background-color: #121212;">
            <div class="flex justify-between gap-3 items-center mt-2 h-[50px] px-3 py-2">
                <span class='text-main_text_color font-sans font-semibold'>FILTER</span>
                <img src='assets/images/filter.svg' width="25" />
            </div>

            <form>
                <span class="text-[16px]  font-bold text-gray-700">Categorie:</span>
                <?php $categories = ["Tous", "Classique", "Premium", "VIP"] ?>
                <div class=" w-full  py-5 px-3 flex flex-col gap-3">
                    <?php foreach ($categories as $category): ?>
                        <div class="flex justify-start items-center w-[80%] m-auto gap-3 ">
                            <?= Search::radio("category", $category, $_GET); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
        <div class=" w-[80%] px-3 mt-2 ">
            <div class="w-full py-3 flex justify-around items-center bg-[#121212]">
                <div class="flex justify-between items-center gap-3">
                    <span class=" text-btnprimary bg-btnprimary p-2 ">place</span>
                    <h2 class="text-main_text_color">Selectionée</h2>
                </div>
                <div class="flex justify-between items-center gap-3">
                    <span class=" text-[#121212] border border-btnprimary p-2 ">place</span>
                    <h2 class="text-main_text_color"> Disponible</h2>
                </div>
                <div class="flex justify-between items-center gap-3">
                    <span class=" text-btnsecondary bg-btnsecondary p-2 ">place</span>
                    <h2 class="text-main_text_color">Occupée</h2>
                </div>

            </div>

            <?php foreach ($matchedCars as $car): ?>
                <div class="w-full flex justify-center items-center bg-[#121212] mt-2 h-auto">
                    <div class="w-[60%] flex flex-col justify-start items-start">
                        <div class=" w-full flex justify-between mt-2 py-3">
                            <div class=" w-full  text-[#f2f2f2] flex flex-col gap-2  px-3  ">
                                <span class="text-center">Depart:
                                    <?php echo $car->date['date']; ?>
                                </span>
                                <div class="flex justify-around items-center py-3">
                                    <span>
                                        <?php echo htmlentities($_GET['departure']) ?>
                                    </span>
                                    <img src='assets/images/doubleArrow.svg' alt=' double arrow icon ' />
                                    <span>
                                        <?php echo htmlentities($_GET['arrival']) ?>
                                    </span>
                                </div>
                                <div class="flex justify-between w-full py-3">
                                    <span>Ar
                                        <?php echo $car->frais ?>
                                    </span>
                                    <span>
                                        <?php
                                        echo Search::countAvailablePlace($car->place)
                                            ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="w-[60%] flex flex-col items-center justify-center">
                        <div class="grid grid-cols-4 gap-1 w-[50%] py-5">
                            <div class="col-span-2">chauffeur</div>

                            <?php foreach ($car->place as $place): ?>
                                <?= Search::CustomCheckbox("place", $place) ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>


    </div>

</div>


<script src='js/front/selectOption.js'></script>
<script src='js/front/request_handler.js'></script>
<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/layout.php') ?>
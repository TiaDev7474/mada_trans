<?php
$title = 'Reseravation'
    ?>

<?php ob_start(); ?>
<div class="w-full min-h-screen  bg-mainbgColor ">
    <?php require('./components/nav.php'); ?>
    <div class="w-full mt-4  md:w-[80%] lg:w-[90%] m-auto px-2">
        <form action="?action=search" method=" GET">
            <div class="flex justify-between lg:justify-around items-center w-full flex-wrap">
                <input type='text' name='action' class="hidden" value='search' />
                <div class="relative flex flex-col mb-2 w-[45%] md:w-[45%] lg:w-[25%]">
                    <label for='departure' class="font-bold text-gray-700 mb-2 ">Departure</label>
                    <input name='departure' id="departure" value="<?php echo htmlentities($_GET['departure']); ?>"
                        class="w-full  border border-gray-300 rounded-lg bg-[#09090936]  text-main_text_color text-[14px] focus:outline-none py-3 px-3 mt-2"
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
                        class="w-full  border border-gray-300 rounded-lg bg-[#09090936] text-main_text_color text-[14px] focus:outline-none py-3 px-3 mt-2"
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
                        class="w-full  border border-gray-300 rounded-lg bg-[#09090936] text-main_text_color text-[14px] focus:outline-none py-3 px-3 mt-2 mb-2" />
                </div>
                <button type='submit'
                    class="bg-btnsecondary flex justify-center items-center px-5 py-3 mt-6 w-full gap-2 lg:w-auto hover:opacity-95">
                    <span class="font-semibold text-main_text_color lg:hidden">RECHERCHER</span>
                    <img src='assets/images/Search.svg' />

                </button>




                <!-- <button class="w-full bg-btnprimary rounded-lg text-[#f2f2f2] px-3 py-2 mt-2 hover:opacity-95"
                    type='submit'>RECHERCHER</button> -->
            </div>
        </form>
    </div>
    <div class="text-white">
        <?php foreach ($matchedCars as $car): ?>
            <div class="">

            </div>
        <?php endforeach; ?>
    </div>

</div>



<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/layout.php') ?>
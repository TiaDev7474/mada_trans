<?php $title = "MadaTrans" ?>

<?php ob_start(); ?>

<div
    class="w-full min-h-screen bg-[url('assets/images/Stacic.png')] bg-no-repeat bg-contain bg-left-8 blur-3 -z-2 bg-mainbgColor ">
    <div
        class="absolute left-[25%] bottom-[20%] md:bg-gradient-to-r from-btnsecondary via-mainbgColor to-btnprimary w-[150px] h-[150px] rounded-lg blur-3xl ">

    </div>

    <?php require('./components/nav.php'); ?>

    <div class=" w-full  mt-7 gap-4 md:mt-20  lg:flex justify-around lg:mt-35 backdrop-blur-[1px]">
        <div class=" w-full md:w-[80%] align-center flex flex-col lg:mt-20  lg:w-[35%] px-5 h-full">
            <span class="w-[70px] h-[6px] bg-gradient-to-r from-btnprimary to-btnsecondary rounded-lg  mb-5"></span>
            <span
                class=" text-[32px] md:text-[48px] font-sans leading-tight text-main_text_color font-semibold mb-5 ">Profitez
                de la
                route
                en voyageant
                avec
                nous
            </span><br>
            <span class="text-main_text_color font-sans text-[14px] py-5 mb-5 backdrop-blur-[5x]">Lorem ipsum dolor
                sit
                amet, consectetur
                adipisicing
                elit. Quae
                voluptates
                accusamus, magni eveniet
                ipsam tempora nisi alias veritatis illum exercitationem earum dolorem reiciendis est maxime corrupti
                corporis? Odio, aspernatur ad!
            </span>

            <div class="flex justify-start items-center gap-5">

                <span onclick="handleGoToLogin()"
                    class="w-[150px] text-center text-[#f2f2f2] bg-gradient-to-r from-btnsecondary to-btnprimary hover:opacity-95 hover:text-[#f2f2f2] cursor-pointer rounded-lg py-2 px-5">
                    Explorer
                </span>
                <span onclick="handleGoToLogin()"
                    class="w-[150px] text-btnprimary text-center border border-btnprimary hover:bg-btnprimary hover:text-[#f2f2f2] cursor-pointer rounded-lg py-2 px-5">
                    Se connecter
                </span>
            </div>

        </div>
        <div class=" w-[90%] py-5 px-3  h-auto ml-3 shadow-lg mt-8 lg:w-[500px]">
            <form method="GET">
                <input type='text' name='action' class="hidden" value='search' />
                <div class="relative flex flex-col mb-2">
                    <label for='departure' class="font-bold text-gray-700 mb-2 ">Departure</label>
                    <input name='departure' id="departure"
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
                <div class="relative flex flex-col mb-2">
                    <label for='arrival' class="font-bold text-gray-700 mb-2">Arrival</label>
                    <input id="arrival" name='arrival'
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
                <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
                <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?> "
                    defaultValue="<?php echo date('Y-m-d'); ?>"
                    class="w-full  border border-gray-300 rounded-lg bg-[#09090936] text-main_text_color text-[14px] focus:outline-none py-3 px-3 mt-2 mb-2" />


                <div class="relative flex flex-col mb-2">
                    <label for='categories' class="font-bold text-gray-700 mb-2">Categories</label>
                    <input id="categories" name='category'
                        class="w-full  border border-gray-300 rounded-lg bg-[#09090936] text-main_text_color text-[14px] focus:outline-none py-3 px-3 mt-2"
                        type=text value='' placeholder="Choisir une categorie" />
                    <div class=" hidden absolute top-[90px] bg-white z-20 left-0 w-full " id="select_categories">
                        <?php
                        $categories = ['Tous', 'Premium', 'VIP', 'Classique'];
                        foreach ($categories as $category) {
                            echo "<div class='option_item_category cursor-pointer'>
                            $category</div>";
                        }
                        ;
                        ?>
                    </div>
                </div>
                <button class="w-full bg-btnprimary rounded-lg text-[#f2f2f2] px-3 py-2 mt-2 hover:opacity-95"
                    type='submit'>RECHERCHER</button>
            </form>
        </div>
    </div>
</div>
<script src='js/front/homepage.js'></script>
<script src='js/front/selectOption.js'></script>

<?php $content = ob_get_clean() ?>

<?php require('templates/layout/layout.php'); ?>
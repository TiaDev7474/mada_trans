<div class=" flex justify-between items-center h-[75px] w-full px-6 ">
    <div class=" md:w-[30%]">
        <image src=" assets/images/Logo.svg" alt="logo de madatransport" width='200' />
    </div>

    <div class="w-[35%]">
        <ul class="hidden md:flex md:justify-end md:items-center gap-12 text-main_text_color">
            <li>
                <a class="relative cursor-pointer">Acceuil</a>

            </li>
            <li><a class="relative cursor-pointer">Reservation</a></li>
            <li><a class="relative cursor-pointer">Service</a></li>
            <li><a class="relative cursor-pointer">FAQ</a></li>
        </ul>
    </div>
    <div class="flex flex-justify-end items-center gap-3  ">
        <span onclick="handleGoToLogin()"
            class="hidden md:block w-[150px] text-center text-btnprimary border border-btnprimary hover:bg-btnprimary hover:text-[#f2f2f2] cursor-pointer rounded-lg py-2 px-5">
            Se connecter
        </span>
        <div class=" flex justify-end md:hidden rounded-lg  hover:opacity-90">
            <image width='25' src='assets/images/menu.svg' />
        </div>
    </div>

</div>
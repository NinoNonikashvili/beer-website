<?php require_once '_header.html' ?>
        <menu class="w-[90%] mx-auto">
            <h1 class="text-3xl text-gray-700 font-semibold mt-20 mb-12">Beers you have already searched</h1>
            <div class="grid gap-4 md:grid-cols-3 my-10"> <!--cards wrappper -->
                <div class="rounded-md overflow-hidden shadow-md bg-gray-200">  <!--card -->
                    <img class="w-full h-30 sm:h-48 object-cover"src="" alt="">
                    <div class="w-full flex flex-col items-center py-5 px-4">
                        <h2 class="font-bold">beer name</h2>
                        <h3 class="text-gray-500 text-sm text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, eveniet harum eligendi eos suscipit libero? Veniam ea quo amet ab vero odio repudiandae cupiditate unde, cumque nihil quae, vel iusto.</h3>
                    </div>
                    <div class="w-full flex justify-start bg-yellow-200 py-5 px-4" >
                        <h4>first brewed: 05/2023</h4>
                    </div>
                </div>
            </div>
        </menu>
<?php require_once '_footer.html' ?>
<?php require_once '_header.html' ?>
        <menu class="w-[90%] mx-auto">
            <h1 class="text-3xl text-gray-700 font-semibold mt-20 mb-12">Beers you have already searched</h1>
            <?php if ($products !== null) : ?>
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 my-10"> <!--cards wrappper -->
                <?php foreach ($products as $beer) : ?>
                <div class="rounded-md grid grid-rows-[8] overflow-hidden shadow-lg shadow-slate-300 bg-yellow-300 pt-4">  <!--card -->
                    <img class="h-28 mx-auto row-span-2"src="<?php echo $beer['img']?>" alt="">
                    <div class="w-full py-3 px-4 row-span-1">
                        <h2 class="font-bold text-center mb-4 "><?php echo $beer['name']?></h2>
                    </div >
                    <div class="w-full py-3 px-4 row-span-4">
                        <h3 class="text-gray-500 text-sm text-center"><?php echo $beer['description']?></h3>
                    </div>
                    <div class="w-full bg-yellow-700 py-5 px-4 self-end row-span-1" >
                        <h4 class="text-gray-200">first brewed: <?php echo $beer['first_brewed']?></h4>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <?php endif ?>
        </menu>
<?php require_once '_footer.html' ?>
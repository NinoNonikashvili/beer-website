<?php 


?>

<?php require_once '_header.html' ?>


    <main class="w-nintyper mx-auto">
        <header class="py-12">
            <h2 class="text-6xl font-semibold mb-2">Find Out</h2>
            <h3 class="text-sm">Your Favourite Beer History</h3>
        </header>

        <form action="search" method="post" class="md:w-nintyper w-full mb-8">
            <div class="w-full grid grid-cols-3 gap-1 ">
                
                <input class="col-span-2  border-gray-500 border-2 rounded-md py-4 px-3 focus:outline-none" type="search" name="keyword" id="keyword" placeholder="type beer name..." value="<?php echo $keyword ?>" >
                <button class="col-span-1 text-xl sm:text-2xl px-2 rounded-md bg-yellow-400"type="submit">search</button>
            </div>
        </form>

        <?php if ($products !== null) : ?>
            <form action="search" method="post" id="suggestions" class="mb-8" >
                <h2 class="text-xl text-gray-700 font-medium mb-8">Suggestions: </h2>
                <?php foreach ($products as $beer) : ?>
                    <input class="border-2 border-gray-500 rounded-md py-2 px-2 mr-2 cursor-pointer" name="clicked" type="submit" value="<?php echo $beer->name?>">
                <?php endforeach ?>
            </form>
        <?php endif ?>
        <?php if ($error !== null) : ?>
            <div class="text-red-500 text-xl">
                <?php echo $error ?>
            </div>
        <?php endif ?>
        <?php if ($beerToDisplay !== null) : ?>
                <div class="rounded-md grid max-w-xl mx-auto overflow-hidden shadow-lg shadow-slate-300 bg-yellow-300 pt-4">  <!--card -->
                    <img class="h-28 mx-auto row-span-2"src="<?php echo $beerToDisplay[0]['img'] ?>" alt="">
                    <div class="w-full py-3 px-4 row-span-1">
                        <h2 class="font-bold text-center mb-4"><?php echo $beerToDisplay[0]['name'] ?></h2>
                    </div> 
                    <div class="w-full py-3 px-4 row-span-4"> 
                        <h3 class="text-gray-500 text-sm text-center"><?php echo $beerToDisplay[0]['description'] ?></h3>
                    </div>
                    <div class="w-full bg-yellow-700 py-5 px-4 self-end row-span-1" >
                        <h4 class="text-gray-200">first brewed: <?php echo $beerToDisplay[0]['first_brewed'] ?></h4>
                    </div>
                </div>
        <?php endif ?>

        <div class="flex flex-col px-5 py-6 mt-20 mb-15">
            <h1 class="font-lobster text-4xl mb-10">“Beer is proof that God loves us and wants us to be happy.</h1>
            <h4 class="self-end">Benjamin Franklin</h4>
        </div>               
    </main>
    <?php require_once '_footer.html' ?>
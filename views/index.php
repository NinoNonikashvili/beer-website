<?php 

$products = ["zekari", "argo", "budweiser", "corona", "khazbegi"];

?>

<?php require_once '_header.html' ?>


    <main class="w-nintyper mx-auto">
        <header class="py-12">
            <h2 class="text-6xl font-semibold mb-2">Find Out</h2>
            <h3 class="text-sm">Your Favourite Beer History</h3>
        </header>

        <form action="search" method="post" class="md:w-nintyper w-full mb-8">
            <div class="w-full grid grid-cols-3 gap-1 ">
                <input class="col-span-2  border-gray-500 border-2 rounded-md py-4 px-3 focus:outline-none" type="search" name="keyword" id="keyword" placeholder="type beer name...">
                <button class="col-span-1 text-xl sm:text-2xl px-2 rounded-md bg-yellow-400"type="submit">search</button>
            </div>
        </form>

        <?php if ($products !== null) : ?>
            <form action="search" method="post" id="suggestions" class="mb-8" >
                <h2 class="text-xl text-gray-700 font-medium mb-8">Suggestions: </h2>
                <?php foreach ($products as $beer) : ?>
                    <input class="border-2 border-gray-500 rounded-md py-2 px-2 mr-2 cursor-pointer" name="clicked" type="submit" value="<?php echo $beer?>">
                <?php endforeach ?>
            </form>
        <?php endif ?>

        <div class="flex flex-col px-5 py-6 mt-20 mb-15">
            <h1 class="font-lobster text-4xl mb-10">“Beer is proof that God loves us and wants us to be happy.</h1>
            <h4 class="self-end">Benjamin Franklin</h4>
        </div>               
    </main>
    <?php require_once '_footer.html' ?>
<?php
include 'header.php';
?>
<main>
    <section class="container mx-auto mt-3">
        <form class="d-flex" role="search" method="post" enctype="application/x-www-form-urlencoded" action="search.php">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="nombrePokemon" id="nombrePokemon">
            <button class="btn bg-warning text-white" type="submit">Buscar</button>
        </form>
    </section>
    <?php
    include 'list.php';
    ?>
</main>
<?php
include 'footer.php';
?>


<?php
include 'header.php';
?>
<main>
    <?php
    if(isset($_GET['errorUsuario'])){
        echo '<div class="alert alert-warning"> Usuario o contraseña incorrecta. </div>';
    }
    ?>
    <section class="container mx-auto mt-3">
        <form class="d-flex" role="search" method="post" enctype="application/x-www-form-urlencoded" action="search.php">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="nombrePokemon" id="nombrePokemon">
                <button class="btn bg-warning text-white" type="submit">Buscar</button>
            <?php
            if(isset($_SESSION['user']) && $_SESSION['user'] == 'admin')
                echo '<a href="create.php" style="margin-left: 1em" class="btn bg-success text-white">Crear</a>';
            ?>

        </form>
    </section>
    <?php
    include 'list.php';
    ?>
</main>
<?php
include 'footer.php';
?>


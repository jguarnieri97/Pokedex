<?php
$servername = "localhost";
$username = "root";
$dbname = "pokemon";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}

$sql = "SELECT * FROM pokemon WHERE nombre LIKE '". $_GET['nombre'] ."'";
$result = mysqli_query($conn, $sql);

$pokemon = mysqli_fetch_assoc($result);

include 'header.php';
?>
<style>
    .bg-image{
        background-image: url("https://i.pinimg.com/originals/47/b9/14/47b91495e80426f8b2d419a23c80da59.png");
        background-size: cover;
    }
</style>
<main class="mb-5">
    <section class="container mx-auto mt-3">
        <article class="w-75 mx-auto">
            <div class="bg-danger p-5 rounded border border-dark border-4">
                <div class="text-center bg-image p-5 rounded border border-dark border-4">
                    <?php
                    echo "<img src=" . $pokemon['foto'] . "alt=" . $pokemon['id_pokemon'] . " width=300em' class='p-5 rounded'>";

                    ?>
                </div>

            </div>
            <div class="card bg-dark text-white p-5">
                <?php
                echo "
                    <div class=' d-flex bg-danger p-4 text-center align-items-center justify-content-around rounded'>
                        <img src=img/type/" . strtoupper($pokemon['tipo']) . ".jpg width='50em'>
                        <h2 class='pb-0 mb-0'>" . $pokemon['nombre'] ."</h2>
                        <p class='pb-0 mb-0 fs-4 text-dark fw-bold'>Nro." . $pokemon['numero'] ."</p>
                    </div>
                    <p class='mt-5'>" . $pokemon['descripcion'] ."</p>";
                ?>
                </tbody>
            </div>
        </article>
    </section>

</main>
<?php
include 'footer.php';
?>

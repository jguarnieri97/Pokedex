<?php
include 'header.php';
?>
<?php
if (isset($_POST["numero"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["descripcion"]) && isset($_POST["imagen"])) {
    $servername = "localhost";
    $username = "root";
    $dbname = "pokemon";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    }

    $sql = "INSERT INTO pokemon (nombre, tipo, foto, descripcion, numero) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $_POST["nombre"], $_POST["tipo"], $_POST["imagen"], $_POST["descripcion"], $_POST["numero"]);

    try {
        $result = $stmt->execute();
    } catch (Exception $e) {
        $result = false;
    }

    if($result) {
        header("Location: index.php");
    } else {
        header("Location: create.php?error=" . $_POST["nombre"]);
    }

}
?>
<main>
    <section class="container mx-auto mt-3 w-75">
        <div>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] != "")
                    echo '<div class="alert alert-warning" role="alert"> No se pudo crear el Pokemon ' . $_GET['error'] . '</div>';
            }
            ?>
        </div>
        <div class="container bg-dark p-5 rounded text-center">
            <h2 class="bg-danger p-5 text-white rounded">Crea tu propio Pokemon!</h2>
        </div>
        <article class="container bg-dark p-5 rounded">
            <form class="container bg-danger rounded p-5 text-white fw-bold" method="post" action="create.php">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <label for="num-pokemon">Número:</label>
                        <input type="number" class="rounded border-1 p-1" id="num-pokemon" name="numero">
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <label for="nom-pokemon">Nombre:</label>
                        <input type="text" class="rounded border-1 p-1" id="nom-pokemon" name="nombre">
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <label for="type-pokemon">Tipo:</label>
                        <select class="rounded border-1 p-1" id="type-pokemon" name="tipo">
                            <option value="fuego">Fuego</option>
                            <option value="agua">Agua</option>
                            <option value="hierba">Hierba</option>
                        </select>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <label for="desc-pokemon">Descripcion:</label>
                        <input type="text" class="rounded border-1 p-1" id="desc-pokemon" name="descripcion">
                    </div>
                    <br>
                    <div class="d-flex justify-content-between">
                        <label for="img-pokemon">Foto:</label>
                        <input type="text" class="rounded border-1 p-1" id="img-pokemon" name="imagen">
                    </div>
                    <br>
                    <div class="text-center">
                        <button class="btn bg-warning text-white px-5 fw-bold" type="submit">Crear</button>
                    </div>
                </div>
            </form>
        </article>

    </section>
</main>
<?php
include 'footer.php';
?>

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
    <section class="container mx-auto mt-3">
        <div>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] != "")
                    echo '<div class="alert alert-warning" role="alert"> No se pudo crear el Pokemon ' . $_GET['error'] . '</div>';
            }
            ?>
        </div>
        <form class="d-flex flex-column" method="post" action="create.php">
            <div>
                <label for="num-pokemon">numero</label>
                <input type="number" class="rounded border-1 p-1" id="num-pokemon" name="numero">
            </div>
            <br>
            <div>
                <label for="nom-pokemon">nombre</label>
                <input type="text" class="rounded border-1 p-1" id="nom-pokemon" name="nombre">
            </div>
            <br>
            <div>
                <label for="type-pokemon">tipo</label>
                <select class="rounded border-1 p-1" id="type-pokemon" name="tipo">
                    <option value="fuego">Fuego</option>
                    <option value="agua">Agua</option>
                    <option value="hierba">Hierba</option>
                </select>
            </div>
            <br>
            <div>
                <label for="desc-pokemon">descripcion</label>
                <input type="text" class="rounded border-1 p-1" id="desc-pokemon" name="descripcion">
            </div>
            <br>
            <div>
                <label for="img-pokemon">foto</label>
                <input type="text" class="rounded border-1 p-1" id="img-pokemon" name="imagen">
            </div>
            <br>
            <div>
                <button class="btn bg-warning text-white" type="submit">Crear</button>
            </div>
        </form>
    </section>
</main>
<?php
include 'footer.php';
?>

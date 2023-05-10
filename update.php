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

    $sql = "UPDATE pokemon SET nombre=?, tipo=?, foto=?, descripcion=?, numero=? WHERE id_pokemon=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $_POST["nombre"], $_POST["tipo"], $_POST["imagen"], $_POST["descripcion"], $_POST["numero"], $_GET["id_pokemon"]);

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
            <?php

            if(isset($_GET["id_pokemon"])){

                $servername = "localhost";
                    $username = "root";
                    $dbname = "pokemon";
                    $password = "";

                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    if (!$conn) {
                        die("Connection failed" . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM pokemon WHERE ID_POKEMON = " . $_GET["id_pokemon"];
                    $result = mysqli_query($conn, $sql);
                    $pokemon = mysqli_fetch_assoc($result);
                echo "<form class='d-flex flex-column' method='post' action='update.php?id_pokemon={$_GET["id_pokemon"]}'>";
                    echo "<div>
                    <label for='num-pokemon'>numero</label>
                    <input type='number' class='rounded border-1 p-1' id='num-pokemon' name='numero' value='{$pokemon["numero"]}'>
                </div>
                <br>
                <div>
                    <label for='nom-pokemon'>nombre</label>
                    <input type='text' class='rounded border-1 p-1' id='nom-pokemon' name='nombre' value='{$pokemon["nombre"]}'>
                </div>
                <br>
                <div>
                    <label for='type-pokemon'>tipo</label>
                    <select class='rounded border-1 p-1' id='type-pokemon' name='tipo'>
                        <option selected = ({$pokemon["tipo"]} == 'fuego' ? true : false) value='fuego'>Fuego</option>
                        <option selected = ({$pokemon["tipo"]} == 'agua' ? true : false) value='agua'>Agua</option>
                        <option selected = ({$pokemon["tipo"]} == 'hierva' ? true : false) value='hierba'>Hierba</option>
                    </select>
                </div>
                <br>
                <div>
                    <label for='desc-pokemon'>descripcion</label>
                    <input type='text' class='rounded border-1 p-1' id='desc-pokemon' name='descripcion' value='{$pokemon["descripcion"]}'>
                </div>
                <br>
                <div>
                    <label for='img-pokemon'>foto</label>
                    <input type='text' class='rounded border-1 p-1' id='img-pokemon' name='imagen' value='{$pokemon["foto"]}'>
                </div>
                <br>
                <div>
                    <button class='btn bg-warning text-white' type='submit'>Crear</button>
                </div>";
                }
                ?>
            </form>
        </section>
    </main>
<?php
include 'footer.php';
?>
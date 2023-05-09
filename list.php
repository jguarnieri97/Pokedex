<?php
$servername = "localhost";
$username = "root";
$dbname = "pokemon";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}

$sql = "SELECT * FROM pokemon";
$result = mysqli_query($conn, $sql);

$pokemonList = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pokemon = array();
        $pokemon['id_pokemon'] = $row['id_pokemon'];
        $pokemon['nombre'] = $row['nombre'];
        $pokemon['tipo'] = $row['tipo'];
        $pokemon['foto'] = $row['foto'];
        $pokemon['numero'] = $row['numero'];
        $pokemonList[] = $pokemon;
    }
}
mysqli_close($conn);
?>
<section class="container-fluid mt-2">
    <?php
    if(isset($_GET['error'])){
        if($_GET['error'] != "")
        echo  '<div class="alert alert-warning" role="alert">' . $_GET['error'] . ' no existe.</div>';
    }
    ?>
    <table class="table">
        <thead class="text-center">
            <tr class="bg-warning text-white">
                <th scope="col">Numero</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            foreach ($pokemonList as $pokemon){
                echo "<tr>
                    <td>" . $pokemon['numero'] ."</td>
                    <td>" . $pokemon['nombre'] ."</td>
                    <td> <img src=img/type/" . strtoupper($pokemon['tipo']) . ".jpg width='100em'></td>
                    <td><img src=" . $pokemon['foto'] . "alt=" . $pokemon['id_pokemon'] . "></td>
                    <td> <a href='delete.php?id=" . $pokemon['id_pokemon'] . "'>Borrar</a></td>";
            }
            ?>
        </tbody>
    </table>
</section>
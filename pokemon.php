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

$pokemon = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $param = array();
        $param['id_pokemon'] = $row['id_pokemon'];
        $param['nombre'] = $row['nombre'];
        $param['tipo'] = $row['tipo'];
        $param['foto'] = $row['foto'];
        $param['descripcion'] = $row['descripcion'];
        $param['numero'] = $row['numero'];
        $pokemon[] = $param;
    }
}
include 'header.php';
?>
<main>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Numero</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Foto</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($pokemon as $param){
            echo "<tr>
                    <td>" . $param['numero'] ."</td>
                    <td>" . $param['nombre'] ."</td>
                    <td> <img src=img/type/" . strtoupper($param['tipo']) . ".jpg width='100em'></td>
                    <td>" . $param['descripcion'] ."</td>
                    <td><img src=" . $param['foto'] . "alt=" . $param['id_pokemon'] . "></td>";
        }
        ?>
        </tbody>
    </table>
</main>
<?php
include 'footer.php';
?>

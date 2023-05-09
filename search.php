<?php
$servername = "localhost";
$username = "root";
$dbname = "pokemon";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed" .mysqli_connect_error());
}

if(isset($_POST['nombrePokemon'])){
    $sql = "SELECT * FROM pokemon WHERE nombre LIKE '". $_POST['nombrePokemon'] ."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header('Location: pokemon.php?nombre=' . $_POST['nombrePokemon']);
    } else {
        header('Location: index.php?error=' . $_POST['nombrePokemon']);
    }
}
mysqli_close($conn);
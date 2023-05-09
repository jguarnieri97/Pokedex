<?php
$servername = "localhost";
$username = "root";
$dbname = "pokemon";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed" .mysqli_connect_error());
}

$sql = "DELETE FROM pokemon WHERE id_pokemon ='". $_GET['id'] ."'";
$result = mysqli_query($conn, $sql);
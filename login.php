<?php
if(isset($_POST['user']) && isset($_POST['password'])){
    $servername = "localhost";
    $username = "root";
    $dbname = "pokemon";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed" .mysqli_connect_error());
    }

    $sql = "SELECT * FROM usuario WHERE nombre LIKE '". $_POST['user'] ."'";
    $userResult = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($userResult);

    if($user['nombre'] == $_POST['user'] && $user['contraseña'] == $_POST['password'] && $user['admin'] == 1){
        session_start();
        $_SESSION['user'] = 'admin';
        header('Location: index.php');
    } else if($user['nombre'] == $_POST['user'] && $user['contraseña'] == $_POST['password'] && $user['admin'] == 0){
        session_start();
        $_SESSION['user'] = 'user';
        header('Location: index.php');
    }else{
        header('Location: index.php?errorUsuario=1');
    }
}

if(isset($_GET['close'])){
    session_start();
    session_destroy();
    header('Location: index.php');
}
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pokedex</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav class="navbar bg-danger">
                <div class="container-fluid">
                    <a class="navbar-brand text-white align-items-center fw-bold" href="index.php">
                        <img src="https://www.pngall.com/wp-content/uploads/4/Pokeball-PNG-Free-Download.png" alt="Logo" width="50em" class="d-inline-block align-text-top">
                        Pokedex
                    </a>
                    <?php
                    if(!isset($_SESSION['user'])){
                        echo '<form class="d-flex" method="post" enctype="application/x-www-form-urlencoded" action="login.php">
                        <label for="exampleFormControlInput1" class="col-form-label text-white mx-2 fw-bold">Usuario</label>
                        <input type="text" class="rounded border-0 p-2 fw-bold" placeholder="usuario" name="user">
                        <label for="exampleFormControlInput1" class="col-form-label text-white mx-2 fw-bold">Contrasaeña</label>
                        <input type="password" class="rounded border-0 p-2 fw-bold" placeholder="contraseña" name="password">
                        <button class="btn bg-warning text-white mx-2 fw-bold" type="submit">Iniciar Sesion</button>
                    </form>';
                    } else{
                        echo '<a class="btn bg-warning text-white mx-2 fw-bold" href="login.php?close=1">Cerrar Sesion</a>';
                    }

                    ?>
                </div>
            </nav>
        </header>

<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <!-- empieza Navbar -->

  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="inicio.php"><img src="../img/tec.jpg" width="90px" height="90px"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="inicio.php">Inicio <span class="glyphicon glyphicon-home"></span></a>
      </li>

      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Administrar Articulos <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="categorias.php">Categorias</a>
          <a class="dropdown-item" href="articulos.php">Articulos</a>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="clientes.php">Clientes <span class="glyphicon glyphicon-user"></span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="ventas.php">Vender Articulo<span class="glyphicon glyphicon-usd"></span></a>
      </li>

      
      <?php
        if($_SESSION['usuario']=='admin'):
         ?>
      <li>
        <li class="nav-item active ">
        <a class="nav-link" href="usuarios.php">Administrar Usuarios<span class="glyphicon glyphicon-user"></span></a>
      </li>
      <?php 
       endif;
          ?>

          <li class="nav-item active">
        <a class="nav-link" href="manualdeusuario.php">Manual de Usuario<span class="glyphicon glyphicon-book"></span></a>
      </li>

      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-user"></span>
        Usuario: <?php echo $_SESSION['usuario']; ?>
        <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a style="color: red" href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a>
        </div>
      </li>

      </ul>
    </div>
</nav>
</div>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);
    }
    else {
      $('.logo').height(100);
    }
  }
  );
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e5720b39b8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../JS/scripts.js">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Login</title>
</head>
<?php 
  
  include_once '../Procesos/user.php';
  include_once '../Procesos/user_session.php';

  
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['user'])){
        $cliente = $_SESSION['user'];
    }else{
  header('Location: login.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }
  ?>
<header> 
    <div class="cabezera">
        <div class="row">
            <div class="logo col-4"><h1>Bibliotek</h1></div>
            <div class="menu row col-8">
                <div class="col-8"></div>
                <div class="col-1"><a href="#infor_1"><i class="fa fa-home" aria-hidden="true"></i>Home</a> </div>
                <div class="col-1"><a href="#lista_libros_1"><i class="fa-solid fa-book"></i>Libros</a></div>
                <div class="col-1"><a href="#nosotros"><i class="fa-solid fa-map-location-dot"></i>Nosotros</a> </div>
                <div class="dropdown-container col-1">
                    <span><i class="fa fa-plus" aria-hidden="true"> <?php echo $cliente;?> </i></span>
                    <ul>
                        <li><a href="">Informacion</a></li>
                        <li><a href="">Cerrar sesion</a></li>
                        <li>Ayuda</li>
                    </ul>
                </div>
        </div>
    </div>
</header>
<body>
    <div class="listaLibro">
    <div class="lista_libros_1">
            <div class="tarjetero">
                <?php
                    include '../Procesos/configServer.php';
                    include '../Procesos/consulSQL.php';
                    $consulta= ejecutarSQL::consultar("SELECT  N_Libro, NombreL, Img, Genero, Edicion, NombreA 
                    FROM libros, autores where N_autor = Autores_N_autor and Disponibilidad = 1 ORDER BY N_Libro");
                    $ListaCosches = mysqli_num_rows($consulta);
                    if($ListaCosches>0){
                        while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                            $idLibro = $fila['N_Libro'];
                    ?>
                <div class="tarjeta">
                    <div class="img"><?php echo "<img src='../".$fila['Img']."'>";?></div>
                    <div><h5><?php echo $fila['NombreL'];?></h5></div>
                    <div><p><?php echo $fila['NombreA'];?></p></div>
                    <div><?php echo $fila['Edicion'];?></div>
                    <div>
                        <form action="solicitarPrestamo.php" method="post">
                            <input type="hidden" name="Prestamo"  valuel="<?=$$cliente?>">
                            <input type="hidden" name="libro"  value="<?=$idLibro?>">
                            <input type="submit" class="btn btn-custom" value="Solicitar prestamo">
                        </form>
                    </div>
                </div>
                <?php
                      }
                      }
                ?>
            </div>

        </div>
</div>
    
</body>
<footer class="pie_pagina container">
    <div class="row">
        <div class="pie col-4">
            <div><h4>Contacto</h4></div>
            <div><p>Correo: ayuda@bibliotek.com</p></div>
            <div><p>Telefono: 6462103025</p></div>
        </div>
        <div class="pie col-4">
            <div><h4>Dirreccion</h4></div>
            <div><p>Universidad Autónoma de Baja California - UABC Campus Valle Dorado</p></div>
        </div>
        <div class="pie col-4">
            <div><h4>©</h4></div>
            <div><p>Copyright &copy; Bibliotek FH 2022</p></div>
        </div>
        </div>
</footer>
</html>
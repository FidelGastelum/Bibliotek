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
    <title>Bibliotek</title>
</head>
<header> 
    <div class="cabezera">
        <div class="row">
            <div class="logo col-4"><h1>Bibliotek</h1></div>
            <div class="menu row col-8">
                <div class="col-7"></div>
                <div class="col-1"><a href="#infor_1"><i class="fa fa-home" aria-hidden="true"></i>Home</a> </div>
                <div class="col-1"><a href="listaAdministradores.php"><i class="fa-solid fa-book"></i>Lista admins</a></div>
                <div class="col-1"><a href="listaUsuarios.php"><i class="fa-solid fa-map-location-dot"></i>Lista usuarios</a> </div>
                <div class="col-1"><a href="Libros.php"><i class="fa-solid fa-map-location-dot"></i>Lista libros</a> </div>
                <div class="dropdown-container col-1">
                    <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <ul>
                        <li><a href="http://localhost/Bibliotek/login.html">Iniciar sesion</a></li>
                        <li><a href="http://localhost/Bibliotek/registro.php">Crear usuario</a></li>
                        <li>Ayuda</li>
                    </ul>
                </div>
        </div>
    </div>
</header>
<body>
    <div class="listaPrestamos">
        <h2>Historial de prestamos</h2>
        <h4><a href="homeAdministrador.php">Prestamos activos</a></h4>
    <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero de prestamo</th>
                    <th>Fecha de prestamo</th>
                    <th>Fecha de regreso</th>
                    <th>Libro</th>
                    <th>Usuario</th>
                    <th>administrador</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include '../Procesos/configServer.php';
                  include '../Procesos/consulSQL.php';
                  $x = "Cerrado";
                  $consulta= ejecutarSQL::consultar("SELECT N_Prestamo, FSalida, FEntrada, Estado, NombreL, NombreU, uApellido, A_Usuario FROM prestamo, libros, usuario, administradores 
                  where N_Libro = libros_N_Libro and usuario_N_Usuario = N_Usuario and N_Admin = administradores_N_Admin and Estado  = '".$x."'");
                  $ListaUsuarios = mysqli_num_rows($consulta);
                  if($ListaUsuarios>0){
                      while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                        $nuemeroPrestamo = $fila['N_Prestamo'];
                        $fechaSalida = $fila['FSalida'];
                        $fechaRegreso = $fila['FEntrada'];
                        $nombreLibro = $fila['NombreL'];
                        $nombreUsuario = $fila['NombreU'];
                        $apellidoUsuario = $fila['uApellido'];
                        $administrador = $fila['A_Usuario'];
                        $estado = $fila['Estado'];
                ?>
                <tr>
                    <td><?php echo $nuemeroPrestamo;?></td>
                    <td><?php echo $fechaSalida;?></td>
                    <td><?php echo $fechaRegreso;?></td>
                    <td><?php echo $nombreLibro;?></td>
                    <td><?php echo $nombreUsuario. " " .$apellidoUsuario ;?></td>
                    <td><?php echo $administrador;?></td>
                    <td><?php echo $estado;?></td>
                </tr>
                <?php
                      }
                      }
                ?>             

            </tbody>
        </table>
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
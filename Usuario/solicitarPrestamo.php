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
    <title>Solicitar prestamo</title>
</head>
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
                    <span><i class="fa fa-plus" aria-hidden="true"> </i></span>
                    <ul>
                        <li><a href="">Informacion</a></li>
                        <li><a href="">Cerrar sesion</a></li>
                        <li>Ayuda</li>
                    </ul>
                </div>
        </div>
    </div>
</header>
<body ><br>
<table>
    <tr>
        <th><br></th>
        <?php
        $usuario= $_POST['Prestamo'];
        $libro = $_POST['N_Libro'];

        
        include '../Procesos/configServer.php';
        include '../Procesos/consulSQL.php';
        $consulta= ejecutarSQL::consultar("SELECT DISTINCT N_Libro, Img, NombreL, NombreA, Genero, Editorial,Autores_N_autor, Disponibilidad from libros, autores
        where N_Libro = '$libro' limit 1");
        $ListaLibros = mysqli_num_rows($consulta);
        if($ListaLibros>0){
            while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
        ?>
        <th>
        <?php echo "<img src='../".$fila['Img']."' style='height: 400px;'>";?>
        </th>
        
        <th>
            <h3><?php echo $fila['NombreL'];?> </h3>
            <h5>Autor: <?php echo $fila['NombreA'];?></h5>
            <h5>Genero : <?php echo $fila['Genero'];?></h5>
            <h5>Editorio: <?php echo $fila['Editorial'];?></h5>
            <form action="../Proceso/solicitarPrestamo.php" method="post">
                <input type="date" name="fecha">
                <input type="hidden" name="Prestamo"  valuel="<?=$usuario?>">
                <input type="hidden" name="N_Libro" value="<?=$fila['N_Libro'];?>">
                <input type="submit" class="btn btn-custom" value="Solicitar prestamo">
            </form>
        </th>

    </tr>
    <?php
                        }
                        }
            ?>
</table>    

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
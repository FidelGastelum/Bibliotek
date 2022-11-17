<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>TeslaCarRent</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link  rel="icon"   href="Img/logo.png" type="image/png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="../CSS/Style.css" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/e5720b39b8.js" crossorigin="anonymous"></script>
  <link href="../CSS/catalogo.css" rel="stylesheet" type="text/css">
  <link href="../CSS/cuerpo.css" rel="stylesheet" type="text/css">
  <link href="../CSS/formulario.css" rel="stylesheet" type="text/css">
  <link href="../CSS/Tablas.css" rel="stylesheet" type="text/css">
  <?php 
  
  
  include '../Procesos/configServer.php';
  include '../Procesos/consulSQL.php';

    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['user'])){
        $cliente = $_SESSION['user'];
    }else{
  header('Location: login.php');//Aqui lo redireccionas al lugar que quieras.
     
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblitek";

    $usuario=$_POST['idUsuario'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $verificar=  ejecutarSQL::consultar("SELECT  N_Usuario, NombreU, Apellido, Direccion, FNacimiento FROM usuario WHERE N_Usuario='".$usuario."'");
    $result = mysqli_num_rows($verificar);
    

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $numeroCliente = $row['N_Usuario'];
        $nombre = $row['NombreU'];
        $apellido = $row['Apellido'];
        $direccion = $row['Direccion'];
        $fechaDeNacimiento = $row['FNacimiento'];
      }
    } else {
      
    }


    ?>
</head>
<header> 
    <div class="cabezera">
        <div class="row">
            <div class="logo col-4"><h1>Bibliotek</h1></div>
            <div class="menu row col-8">
                <div class="col-8"></div>
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">



<div class="container">
        <div class="row">
            <div class="col-1 "></div>
            <div class="formulario col-10">
               <div class="registroU">
                    <form action="../actualizarCliente.php" method="post">
                      <table> 
                        <thead >
                          <tr class="Heading">
                            <th></th>
                          <th class="Cell">Informacion anterior</th>
                          <th class="Cell">Nueva informacion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><h6>Nombre:</h6></td>
                            <td> <?php echo $nombre;?></td>
                            <td><input type="number" name="Placas" id="Pl" ></td>
                          </tr>
                          <tr>
                            <td><h6>Apellido: </h6></td>
                            <td><?php echo $apellido;?></td>
                            <td><input type="text" name="Modelo" id="Mo" ></td>
                          </tr> 
                          <tr>
                            <td><h6>Direccion: </h6></td>
                            <td><?php echo $direccion;?></td>
                            <td><input type="text" name="Tipo" id="Ti" ></td>
                          </tr> 
                          <tr>
                            <td><h6>fecha de nacimiento: </h6></td>
                            <td><?php echo $fechaDeNacimiento;?></td>
                            <td><input type="text" name="Marca" id="Ma" ></td>
                          </tr> 
                         
                        </tbody>
                      </table>
                            <input type="hidden" name="usuario" id="id" value="<?=$numeroCliente?>">
                            <input type="submit" class="btn btn-custom" value="Actualizar">
                            <button onclick="ListaCarros.php" class="btn btn-custom">Regresar</button>
                        
                    </form>
               </div>
            </div>
            <div class="col-1 border"></div>
        </div>
    </div>

    <tbody>
      
    </tbody>

</div>



<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
   
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})

</script>

</body>
</html>
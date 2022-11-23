
  <?php
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

  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblitek";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $usuario = $_POST['Prestamo'];
    $libro = $_POST['N_Libro'];
    $fecha = $_POST['fecha'];
    $fecha = $_post['fecha2']
    $estado = "0"
    $estadoPrestamo = "Pendiente";
   
       $sql = "UPDATE libros SET Disponibilidad = .'$estado'. WHERE N_libro = '$libro'";
    $result = mysqli_query($conn, $sql);

    if($result){
      $consulta= ejecutarSQL::consultar("SELECT N_Usuario FROM usuario  where NombreU = '$usuario'");
      $ListaUsuarios = mysqli_num_rows($consulta);
      $cliente = $fila['N_Usuario'];
            
      if(consultasSQL::InsertSQL("prestamos", "FSalida, FEntrada, Estado, libros_N_Libro, usaurio_N_Usuario",
      "'$fecha','$fecha', '$estadoPrestamo', '$libro', ' $cliente'")){                  
      header('Location: ../admin/Libros.php');
      }else{
      echo '<script>swal("ERROR", "No se puedo registrar al usuario en el sistema", "error");</script>';
       }
       
    
    }else{
      echo "Error1";
    }
    

   


?>



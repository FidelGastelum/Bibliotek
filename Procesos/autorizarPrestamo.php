<?php 
  
  include_once '../Procesos/admin.php';
  include_once '../Procesos/admin_session.php';
  include '../Procesos/configServer.php';
  include '../Procesos/consulSQL.php';



    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $numeroPrestamo=$_POST['N_Prestamo'];
    $estado = "Activo"; 

    
    
    $sql = "UPDATE prestamo SET Estado = '$estado' WHERE N_Prestamo = '$numeroPrestamo'";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: ../admin/homeAdministrador.php");
    }


?>
?>


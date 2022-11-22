<?php 
  
  include_once '../Procesos/admin.php';
  include_once '../Procesos/admin_session.php';
  include '../Procesos/configServer.php';
  include '../Procesos/consulSQL.php';


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
    $id=$_POST['N_Prestamo'];
    $estado = "Cerrado"; 

    
    
    $sql = "UPDATE prestamo SET Estado = '$estado' WHERE N_Prestamo = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: ../admin/homeAdministrador.php");
    }


?>
?>


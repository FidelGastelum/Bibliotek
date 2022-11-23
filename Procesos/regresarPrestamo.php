<?php 
  
  include_once '../Procesos/admin.php';
  include_once '../Procesos/admin_session.php';
  include '../Procesos/configServer.php';
  include '../Procesos/consulSQL.php';


   
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    }
    $numeroPrestamo=$_POST['N_Prestamo'];
    $estado = "Cerrado"; 

    
    
    $sql = "UPDATE prestamo SET Estado = '$estado' WHERE N_Prestamo = '$numeroPrestamo'";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: ../admin/homeAdministrador.php");
    }


?>
?>


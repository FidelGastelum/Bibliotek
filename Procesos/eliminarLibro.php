
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
    $libro=$_POST['libro'];
    
    $sql = "DELETE FROM libros WHERE N_Libro = $libro";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: listaLibros.php");
    }

?>

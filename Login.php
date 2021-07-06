<?php
// if(isset($_POST['Email'])){
// $Email = $_POST["Email"];
// $Password = $_POST["Password"];
// Login($Email,$Password);
// }

// function Login($Email,$Password){
//   $server = "localhost";
//   $username ="root";
//   $password ="";
//   $database = "database-miros";
//   $conn = mysqli_connect ($server,$username,$password,$database);
  
  
  
//   // $sql = "INSERT INTO users (Email, Password) VALUES ('$Email','$Password')";
//   // $_Email = mysql_real_escape_string($Email);
//   // $_Password = mysql_real_escape_string($Password);
//   $sql = "SELECT  Email, Password FROM users WHERE Email = '$Email' AND Password = '$Password'";
  
//   echo($sql);
//   if(!$conn){
//     die("Conexion fallida: " . mysqli_connect_error());
//   }
  
//   $result = mysqli_query($conn, $sql); 
      
   
//   if (mysqli_num_rows($result) > 0) {
    
//     while($row = mysqli_fetch_assoc($result)) {
//       echo "Bienvenido : Email: " . $row["Email"]. " Password: " . $row["Password"]. "<br>";
//     }
//   } else {
//     echo "Sin resultados exitosos";
//   }
// mysqli_close($conn);
// }
 



//New MYSQLI

if(isset($_POST['Email'])){
   $Email = $_POST["Email"];
   $Password = $_POST["Password"];
 
   }

$server = "localhost";
$username ="root";
$password ="";
$database = "database-miros";


$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT  Email, Password FROM users WHERE Email = '$Email' AND Password = '$Password'";

$sql = "SELECT FROM users WHERE Email= mysql_real_escape_string('$Email') AND Password= mysql_real_escape_string('$Password')";
var_dump($sql);
echo($sql); 
$result = $conn->query($sql);

if ($result != false && $result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
      echo "Bienvenido : Email: " . $row["Email"]. " Password: " . $row["Password"]. "<br>";    
    }
} else {
    echo "Sin resultados";
}

$conn->close();
?>




<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
<div class="container">
<div class="login">

<form class="mainlogin" action="Login.php" method="post">
  <div class="mb-3">
    <h1 class="mt-5 mb-3">Login</h1>
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="Email" id="Email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="Password" id="Password">
  </div>
  <div class="btn-submit mt-4">
  <button type="submit" class="submit btn btn-primary">Enviar</button>
  </div>
</form>
</div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
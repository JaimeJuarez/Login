<?php
//New MYSQLI

$server = "localhost";
$username ="root";
$password ="";
$database = "database-miros";
 error_reporting(0);
 
 $conn = new mysqli($server, $username, $password, $database);
 
 if(isset($_POST['Email'])){
   
   $Email = $conn -> real_escape_string($_POST['Email']);
   $Password = $conn -> real_escape_string($_POST['Password']);
  }
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT  Email, Password FROM users WHERE Email = '$Email' AND Password = '$Password'";
  
  $result = $conn->query($sql);
  
  if ($result != false && $result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
      echo "Bienvenido : Email: " . $row["Email"]. " Password: " . $row["Password"]. "<br>";    
    }
     header('Location: https://www.itdoe.org/agora/');
  } else {
    echo "Correo o Contraseña Incorrectos";
  }
  
  $conn->close();
  
  ?>

<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body style=" background: linear-gradient(to right, white 0%, white 50%, black 50%, black 100%);Color:White;">
<div class="container">
<div class="login d-flex">
<div class="img-main col-md-6 col-sm-12">

</div>
<form class="mainlogin col-md-5 col-sm-5 " action="Login.php" method="post">
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
  <button type="submit" class="submit btn btn-primary" onclick="reload()">Enviar</button>
  </div>
</form>
</div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
  <script>if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}</script>
  </body>
</html>
<?php
include 'Login.php';

if (isset ($_POST['Email'])){
    include 'login.php';
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $sql = "INSERT INTO newsletter (`email`) VALUES ( '$Email')";
    $query = mysqli_query($database, $sql);
    unset($_POST['Email']);

    // Redirecciona a la página que deseas
    header('Location: 'Login.php')';
}
?>
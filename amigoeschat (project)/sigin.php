<?php
$firstname= $_POST['firstname'];
$lastname = $_POST['lastname'];
$email    = $_POST['email'];
$pasword  = $_POST['pasword'];
//server det
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "chat";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);
//check connection
if (mysqli_connect_errno()){
  die("Connection failed: " . mysqli_connect_errno());
}
$sql = "INSERT INTO details (firstname, lastname, email, pasword)
         VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);
if ( ! mysqli_stmt_prepare($stmt, $sql)){
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $pasword);
mysqli_stmt_execute($stmt);
header("Location: /amigoeschat (project)/main_site/interface.php")
?>
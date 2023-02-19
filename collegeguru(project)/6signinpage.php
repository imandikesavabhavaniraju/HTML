<?php
$user=$_POST['userno'];
$email=$_POST['email'];
$password=$_POST['word'];

//server det
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "signinpage";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);

//check connection
if (mysqli_connect_errno()){
  die("Connection failed: " . mysqli_connect_errno());
}
$sql = "INSERT INTO details (userno, email, word)
         VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);
if ( ! mysqli_stmt_prepare($stmt, $sql)){
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sss", $userno, $email, $word);
mysqli_stmt_execute($stmt);
echo "Record saved.";
?>
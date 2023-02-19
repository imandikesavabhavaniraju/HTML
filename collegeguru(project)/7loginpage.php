<?php
    $userno=$_POST['user'];
    $word=$_POST['word'];

    //server det
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "final";

    //database connection here// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);

//check connection
if (mysqli_connect_errno()){
  die("Connection failed: " . mysqli_connect_errno());
} else{
    $stmt = $conn->prepare("select * from list where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows >0 ) {

    }else {
        echo "invalid email or password";
    }
}

?>


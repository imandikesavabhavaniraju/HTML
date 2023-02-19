<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "chat";
$conn=mysqli_connect($servername, $username, $password, $db_name);
session_start();
if(isset($_POST['email']) && isset($_POST['pasword']))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$email  = validate($_POST['email']);
$pasword= validate($_POST['pasword']);
if (empty($email))
{
    echo "email is required";
    exit();
}
else if(empty($pasword))
{
    echo "Password is required";
    exit();
}
$sql    = "SELECT * FROM details WHERE email='$email' AND pasword='$pasword'";
$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) 
    {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['pasword'] === $pasword) 
        {
            echo "Logged in!";
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: /amigoeschat (project)/main_site/interface.php");
            exit();
        }
        else
        {
            echo "Incorect User name or password";
            exit();
        }
    }
else
{
    echo "Incorect User name or password";
exit();
}
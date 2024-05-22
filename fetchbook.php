<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";


// $BookName = $_POST['BookName'];
$conn = new mysqli($servername, $username, $password, $dbname);
//Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT BookName  from add_book";
$result = $conn->query($sql);
if($result -> num_rows > 0){
    $option = mysqli_fetch_all($result,MYSQLI_ASSOC);
}


$conn->close();
?>
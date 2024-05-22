<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$prn = $_POST['prn'];

$conn = new mysqli($servername, $username, $password, $dbname);
//Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$selectbook = "SELECT BookID FROM issued WHERE PRN = $prn";
$result = $conn->query($selectbook);
$rows=$result->fetch_assoc();
echo $rows['BookID'];

$deletedata = "DELETE FROM issued WHERE PRN = $prn";
if($conn->query($deletedata) === TRUE){
     echo '<script>alert("Book Returned") </script>';
}else{
    echo "Error: " . $deletedata . "<br>" . $conn->error;
}


$id = $rows['BookID'];
echo $id;
$updatedata = "UPDATE add_book SET NoOfCopies = (NoOfCopies + 1) WHERE BookID = $id";
if($conn->query($updatedata) === TRUE){
    echo '<script>alert("Returned Book Added to the Library") </script>';
}else{
    echo "Error: " . $updatedata . "<br>" . $conn->error;
}
$conn->close();

header("Location: index.html");
exit;
?>
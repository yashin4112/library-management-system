<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$prn = $_POST['prn'];
$date = $_POST['date'];
$mobile = $_POST['mobile'];
$book = $_POST['BookName'];
$bookid = $_POST['BookID'];

//Create Connection
//Query to create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$selectbook = "SELECT NoOfCopies FROM add_book WHERE BookID = $bookid";
$result = $conn->query($selectbook);
$rows=$result->fetch_assoc();
$count = $rows['NoOfCopies'];

if($count <= 0){
  echo '<script>alert("Book Out of Stock") </script>';
  header("Location: index.html");
  exit;
}else{
  $sql = "INSERT INTO issued (FirstName, LastName, PRN, Mobile, Email , BookID, Book) VALUES ('$firstname', '$lastname', '$prn', '$mobile', '$email', $bookid, '$book')";
  if($conn->query($sql) === TRUE){
      echo '<script>alert("Book Issued") </script>';
      
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  $updatesql = "UPDATE add_book SET NoOfCopies = NoOfCopies - 1 WHERE BookID = $bookid";
  if($conn->query($updatesql) === TRUE){
    echo '<script>alert("DataBase Updated") </script>';
  }else{
    echo "Error: " . $updatesql . "<br>" . $conn->error;
  }

  header("Location: index.html");
  exit;
}

$conn->close();
?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$bookname = $_POST['bookname'];
$authorname = $_POST['authorname'];
$bookid = $_POST['bookid'];
$edition = $_POST['edition'];
$copiesofbook = $_POST['copiesofbook'];

$conn = new mysqli($servername, $username, $password, $dbname);
//Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO add_book (BookID, BookName, AuthorName, Edition, NoOfCopies) VALUES ($bookid, '$bookname', '$authorname', '$edition', $copiesofbook)";
if($conn->query($sql) === TRUE){
    echo '<script>alert("New record created successfully")</script>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

header("Location: index.html");
exit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Books</title>
     <style>
        table {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-shadow: 2px 2px 5px red;
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Times New Roman', Times, serif;
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "library";

        $conn = new mysqli($servername, $username, $password, $dbname);
        //Check Connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = " SELECT * FROM add_book";
        $result = $conn->query($sql);
        $conn->close();
    ?>
     <section>
        <h1>Available Books</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Authorname</th>
                <th>Edition of Book</th>
                <th>Total Copies</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['BookID'];?></td>
                <td><?php echo $rows['BookName'];?></td>
                <td><?php echo $rows['AuthorName'];?></td>
                <td><?php echo $rows['Edition'];?></td>
                <td><?php echo $rows['NoOfCopies'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
</html>
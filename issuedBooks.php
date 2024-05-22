<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued Books </title>
    <style>
    
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Times New Roman', Times, serif;
            text-shadow: 2px 2px 5px red;
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
        $sql = " SELECT * FROM issued";
        $result = $conn->query($sql);
        $conn->close();
    ?>
    <section>
        <h1>Issued Books By Students</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Student Name</th>
                <th>PRN</th>
                <th>Mobile</th>
                <th>E-mail ID</th>
                <th>BookID</th>
                <th>Book</th>
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
                <td><?php echo $rows['FirstName'] ." ". $rows['LastName'];?></td>
                <td><?php echo $rows['PRN'];?></td>
                <td><?php echo $rows['Mobile'];?></td>
                <td><?php echo $rows['Email'];?></td>
                <td><?php echo $rows['BookID'];?></td>
                <td><?php echo $rows['Book'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
</html>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="icon"  href="icon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <title>Table with medicine database</title>
    <style>
        body { 
    background-image: url("3.jpg");
    height: 100vh;
    background-size: cover; 
    background-position: center;
 }  
    table {
    border-collapse: collapse;
    width: 100%;
    color: #588c7e;
    font-family: monospace;
    font-size: 25px;
    text-align: left;
    }
    th {
    background-color: #588c7e;
    color: white;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
    </style>
    </head>
    <body>
    <table>
    <tr>
    <th>id</th>    
    <th>medicine Name</th>
    <th>Batch no.</th>
    <th>MRP</th>
    <th>Quantity</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost:3307", "root", "", "doctor");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, mname, batchno, mrp, quantity FROM medicine";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["mname"] . "</td><td>"
    . $row["batchno"]. "</td><td>" . $row["mrp"]. "</td><td>" . $row["quantity"]. "</td></tr>";
    }
    echo "</table>";
    } else { echo "0 results"; }
    $conn->close();
    ?>
    </table>
    </body>
    </html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <style> 
          h1{
                color:chartreuse;
                background-color: black;
                width: fit-content;
                padding: 20px;
                 font-style: italic;
                 border-radius: 20px;
          }
          body{
            background-image: url(bg.jpeg);         
          }
          th{
            background-color:darksalmon;
            padding:15px;
          }
          td{
            padding:10px;
            padding-left: 20px;
            padding-right: 20px;
            background-color:blanchedalmond;
          }
          table{
            border:5px solid black;
            width: 700px;
            
          }
          button{
            display: flex;
                padding: 10px;
                margin: 20px;
                background-color: orange;
                color: black;
                border-radius: 30px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: larger;
                border-color:black;
            }
            button:hover{
                transition: 0.5s ease-in-out;
                background-color:orangered;
                padding:15px;
                
                border: 5px solid black;
            }
            button:not(:hover){
                 transition: 0.5s ease-in-out;
            }
            .bubbles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.bubble {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color:rgba(128, 128 , 128, 0.5);
    animation: bubble 3s infinite;
}

.bubble:nth-child(1) {
    animation-delay: 0s;
    left: 10%;
}

.bubble:nth-child(2) {
    animation-delay: 0.5s;
    left: 30%;
}

.bubble:nth-child(3) {
    animation-delay: 1s;
    left: 50%;
}

.bubble:nth-child(4) {
    animation-delay: 1.5s;
    left: 70%;
}

.bubble:nth-child(5) {
    animation-delay: 2s;
    left: 90%;
}

@keyframes bubble {
    0% {
        transform: translateY(0);
        opacity: 0;
    }
    100% {
        transform: translateY(-100vh);
        opacity: 1;
    }
}
    </style>
</head>
<body>
<div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    <button onclick="window.location.href='pharmacyhome.php'">HOME</button>
    <center>
        
<?php
 
session_start();
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mediguide";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$pharmacyname = $_SESSION['pharmacyname'];
$table_name = "pharmacy_" . preg_replace('/[^A-Za-z0-9_]/', '', $pharmacyname);

// SQL query to fetch all rows and columns
$sql = "SELECT * FROM $table_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1> $pharmacyname Pharmacy </h1>";
    echo "<table border='1'>
            <tr>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Availability</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['medicinename'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['availability'] . "</td>
              </tr>";
    }
    
    echo "</table>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
</center>
</div>
</body>
</html>


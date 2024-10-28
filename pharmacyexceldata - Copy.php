<html>
    <head>
        <title>HOME PAGE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
          body{
            background-image: url(bg.jpeg);         
          }
          h1{
                margin: 10px;
                color: palevioletred;
                background-color: rgb(7, 6, 6);
                width: fit-content;
                padding: 20px;
                 font-style: italic;
                 border-radius: 20px;
            }
            h4{
                background-color: chartreuse;
                width: fit-content;
                border: 3px solid black;
                border-radius: 10px;
                padding:10px;
                margin:30px;
            }
          .wholepage{
            display: flex;
            border: 5px solid black;
            padding: 10px;
          }
          .wholecontainer{
            width: fit-content;
            background-color: transparent;
            border: 3px solid rgb(5, 120, 197);
            border-radius: 20px;
            margin: 10px;
            padding: 20px;
          }
          .container1{
            width:fit-content;
            height: fit-content;
            background-color:burlywood ;
            align-content: center;
            margin: 30px;
            padding: 40px;
            border: 2px solid black;
          }
          .container2{
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 30px;
          }
          .innercontainer2{
            background-color:transparent;
            padding: 10px;
            margin: 5px;
          }
           input{
            margin: 10px;
            padding: 10px;
          }
          label{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
          }

          
          button{
                padding: 10px;
                margin: 20px;
                background-color: orange;
                color: black;
                border-radius: 30px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: larger;
                border-color: greenyellow;
                cursor: pointer;
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

            .btn1{
                 padding: 5px;
                 
                 background-color: greenyellow;
                 border: 3px solid black;
                 margin-top: 25px;
                 margin-bottom: -30px;
                 cursor: pointer;
            }
            .btn1:hover{
                padding: 10px;
                background-color: green;
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
      <?php
      session_start();
      ?>
      <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>

        <div class="wholepage">
            <div class="container2">
                <div><button onclick="window.location.href='pharmacyhome.php'">HOME</button></div>
                <div><button onclick="window.location.href='pharmacydataentry.php'">DATA ENTRY</button></div>
                <div><button onclick="window.location.href='pharmacydatamodify.php'">DATA MODIFY</button></div>
                <div><button onclick="window.location.href='pharmacyexceldata.php'">DATA THROUGH EXCEL</button></div>
                <div><button onclick="window.location.href='pharmacydata.php'">INVENTORY</button></div>
            </div>
            <div class="wholecontainer">
                <center>
                <h1>MEDI-GUIDE</h1>
                <NAV class="container1">
                    <DIV class="innercontainer">
                    <H2>MEDICINE DATA MODIFY</H2>
                    </DIV>
                    <div class="innercontainer2">
                        <form method="post" action="" enctype="multipart/form-data">
                            
                            <div><label>SELECT FILE</label>
                                <input type="file" name="file" required>
                            </div>
                            <span>
                            <button type="submit" class="btn1" name="submit">SUBMIT</button>
                            <button type="reset" class="btn1" name="clear">CLEAR</button>
                            </span>
                            <?php

if (isset($_POST['submit'])) {


$pharmacyname = $_SESSION['pharmacyname']; 

// Database connection
$conn = new mysqli("localhost", "root", "", "mediguide");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize the table name to prevent SQL injection
$table_name = "pharmacy_" . preg_replace('/[^A-Za-z0-9_]/', '', $pharmacyname);

// Check if a file is uploaded
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $csvFile = $_FILES['file']['tmp_name']; // Use the temporary file path from the uploaded file
    
    // Open the CSV file
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        // Skip the first line if it contains headers
        fgetcsv($handle);

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO $table_name (medicinename, quantity, availability) VALUES (?, ?, ?)");

        // Loop through the CSV file and insert data into the database
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $medicine_name = $row[0];
            $stock_count = (int)$row[1]; // Cast to integer to ensure proper data type
            $availability = $row[2];

            // Bind parameters and execute the statement
            $stmt->bind_param("sis", $medicine_name, $stock_count, $availability);
            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error . "<br>";
            }
        }

        // Close the file
        fclose($handle);

        // Close the prepared statement
        $stmt->close();
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<label>CSV data successfully imported!</label>";
    } else {
        echo "Error: Unable to open the file.";
    }
} else {
    echo "Error: No file uploaded or there was an upload error.";
}

// Close the database connection
$conn->close();
}
?>
                        </form>
                    </div>
                </NAV>
                </center>
            </div>
        </div>
        



        
     </div>   
    </body>
</html>

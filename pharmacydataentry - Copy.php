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
        <?php
        session_start();
        ?>
    </head>
    <body>
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
                    <H2>MEDICINE DATA ENTRY</H2>
                    </DIV>
                    <div class="innercontainer2">
                        <form method="post" action="">
                            <div><label>ENTER MEDICINE NAME : </label>
                            <input type="text"  name="name" required></div>
                            <div><label>AVAILABILITY (yes/no) :</label>
                            <input type="text"  name="availability" required></div>
                            <div><label>STOCK COUNT :</label>
                            <input type="text" name="count" required></div>
                            <span>
                            <button type="submit" class="btn1" name="submit">SUBMIT</button>
                            <button type="reset" class="btn1">CLEAR</button>
                            </span>
                            <?php
if (isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "mediguide");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $medicinename = $_POST['name'];
    $quantity = $_POST['count'];
    $availability = $_POST['availability'];
    $pharmacyname = $_SESSION['pharmacyname']; // Corrected variable name
    $table_name = "pharmacy_" . preg_replace('/[^A-Za-z0-9_]/', '', $pharmacyname);

    // SQL query to insert data into the user's specific table
    $sql = "INSERT INTO `" . $table_name . "` (medicinename, quantity, availability) VALUES ('$medicinename', $quantity, '$availability')";

    if ($conn->query($sql) === TRUE) {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<label>DATA INSERTED Successfully</label>";

        $select_sql = "SELECT quantity FROM `" . $table_name . "` WHERE medicinename = '$medicinename'";
        $result = $conn->query($select_sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<br>";
                echo "<label>Updated Quantity: " . $row["quantity"] .  " left </label>";
            }
        } else {
            echo "<br>";
            echo "<label>No records found</label>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

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

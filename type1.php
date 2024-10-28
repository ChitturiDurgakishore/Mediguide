
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medguide</title>
    <style>
        body {
            background-image: url('med.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 63%;
            float: right;
            position: relative;
            right: 150px;
            background-color: #ADD8E6;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s; /* Add animation to container */
        }
        .container2{
            width: 63%;
            float: right;
            position: relative;
            right: 150px;
            background-color: #ADD8E6;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s;
        }
        h1 {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin-top: 20px;
            animation: bounceIn 1s; /* Add animation to h1 */
        }
        .logo {
            width: 100px;
            float: left;
            position: relative;
            bottom: 10px;
            left: 50px;
            animation: spin 2s; /* Add animation to logo */
        }
        .button {
            width: 100px;
            padding: 10px;
            margin: 10px 0;
            text-align: center;
            background-color: #FFF2D7;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
            animation: pulse 2s infinite; /* Add animation to button */
        }
        .button:hover {
            background-color: #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .main-button {
            width: 300px;
            font-size: 20px;
            padding: 20px;
            margin: 40px auto;
            text-align: center;
            background-color: #FFF2D7;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .main-button:hover {
            background-color: #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .input-box {
            width: 80%;
            padding: 20px;
            margin: 20px auto;
            text-align: center;
            background-color: #FFF2D7;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .about-box {
            width: 80%;
            padding: 40px;
            margin: 20px auto;
            text-align: center;
            background-color: #FFF2D7;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .nav button {
            background-color: #ADD8E6;
            border: none;
            padding: 15px 30px;
            margin: 5px;
            margin-left: 30px;
            border-radius: 50px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
            animation: pulse 2s infinite; /* Add animation to nav button */
        }
        .nav button:hover {
            background-color: #FFF2D7 ;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            50% {
                transform: scale(1.1);
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        }
    </style>
</head>
<body>
    
    <h1>MEDI-GUIDE</h1>
    <div class="container"> 
        <form method="post" action="">
        <div class="main-button">GENERIC MEDICINE FINDER</div>
        <div class="input-box">
            <label  >Enter medicine name:</label>
            <input type="text" id="medicine-name" name="name" placeholder="Enter medicine name">  
            <button type="submit" name="submit" >submit</button>
        </div>  
        <center>
        <?php
                    if (isset($_POST['submit'])) {
                        
                        $medicinename = $_POST['name'];
                        $mycon = mysqli_connect("localhost", "root", "", "mediguide");

                        // First query to fetch medicine details
                        $sql = "SELECT * FROM alternatives WHERE name='$medicinename'";
                        $result = $mycon->query($sql);
                        $n = mysqli_num_rows($result);

                        if ($n > 0) {
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<br><br><table border='2'><tr><td>MEDICINE NAME: $row[0]<br></td></tr>";
                                
                                // Second query to fetch price for the main medicine
                                $sql2 = "SELECT * FROM prices WHERE name='$row[0]'";
                                $result2 = $mycon->query($sql2);
                                $n2 = mysqli_num_rows($result2);
                    
                                if($n2 > 0) {
                                    $row2 = mysqli_fetch_row($result2);
                                    echo "<tr><td><center>PRICE : RS $row2[2]<br></center></td></tr>";
                                    echo "</table>";
                                    echo "<br>";
                                    echo "<br>";
                                } else {
                                    echo "<table><tr><td><center> No price found for $row[0]<br></center></td></tr></table>";
                                }
                             
                                // Display alternative medicines and fetch their prices
                                for ($i = 1; $i <= 5; $i++) {
                                    if (!empty($row[$i])) {
                                        echo "<table border=2px black >";
                                        echo "<tr><td>ALTERNATIVE MEDICINE NAME: $row[$i]<br></td></tr>";
                    
                                        // Query to fetch price for each alternative medicine
                                        $sql3 = "SELECT * FROM prices WHERE name='$row[$i]'";
                                        $result3 = $mycon->query($sql3);
                                        $n3 = mysqli_num_rows($result3);
                    
                                        if($n3 > 0) {
                                            $row3 = mysqli_fetch_row($result3);
                                            echo "<tr><td><center>PRICE : RS $row3[2]<br></center></td></tr>";
                                            echo "</table>";
                                            echo "<br>";
                                            echo "<br>";
                                        } else {
                                            
                                            echo "<tr><td>No price found for $row[$i]<br></td></tr>";
                                        }
                                    }
                                }
                    
                                echo "THANK YOU FOR USING OUR APPLICATION";
                            }
                        } else {
                            echo "<br>";
                            echo "PLEASE ENTER CORRECT MEDICINE NAME <br>";
                            echo"<br>CHECK AVAILABLE IT MAY AVAILABLE IN STORES";
                        }
                    
                        mysqli_close($mycon);
                    }
                    
                    ?>
                    </center>
                    
                                    </form>
                                </div>
                                
                                </center>
                                <div class="container2">
                                <center><h3>Medicine Availability<br> in Pharmacies</h3></center>
                                <center>
                                 <?php
                    if (isset($_POST['submit'])) {
                        $medicinename = $_POST['name'];
                        $mycon = mysqli_connect("localhost", "root", "", "mediguide");
                    
                        if ($mycon->connect_error) {
                            die("Connection failed: " . $mycon->connect_error);
                        }
                    
                        // Fetch all tables that start with 'pharmacy_'
                        $sql_tables = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'mediguide' AND table_name LIKE 'pharmacy_%'";
                        $result_tables = $mycon->query($sql_tables);
                    
                        $available_pharmacies = array();
                        $unavailable_pharmacies = array();
                    
                        if ($result_tables->num_rows > 0) {
                            while ($table = $result_tables->fetch_assoc()) {
                                $table_name = $table['table_name'];
                    
                                // Check if the 'medicinename' column exists in the current table
                                $sql_column_check = "SHOW COLUMNS FROM $table_name LIKE 'medicinename'";
                                $result_column_check = $mycon->query($sql_column_check);
                    
                                if ($result_column_check->num_rows > 0) {
                                    // Check if the medicine is available in the current table
                                    $sql_check = "SELECT * FROM $table_name WHERE medicinename='$medicinename'";
                                    $result_check = $mycon->query($sql_check);
                    
                                    if ($result_check && mysqli_num_rows($result_check) > 0) {
                                        $available_pharmacies[] = ucfirst(str_replace('pharmacy_', '', $table_name));
                                    } else {
                                        $unavailable_pharmacies[] = ucfirst(str_replace('pharmacy_', '', $table_name));
                                    }
                                }
                            }
                        } else {
                            echo "No pharmacy tables found.";
                        }
                    
                        // Display available pharmacies
                        if (!empty($available_pharmacies)) {
                            
                            echo "<h2>Available Pharmacies:</h2>";
                            foreach ($available_pharmacies as $pharmacy) {
                                echo "<table border='1'>";
                                echo "<tr><td><marquee><label><a href='https://www.google.com/maps/place/Apollo+Pharmacy+VV+Nagar+Allapur/@17.4591438,78.399468,19.79z/data=!4m6!3m5!1s0x3bcb910037f0c2cd:0x4c4ca02c9199b7e!8m2!3d17.4591564!4d78.3994886!16s%2Fg%2F11vxyzrcb6?entry=ttu&g_ep=EgoyMDI0MTAwMi4xIKXMDSoASAFQAw%3D%3D'>$pharmacy Pharmacy</a></label></marquee></td></tr>";
                                echo "<tr><td>Medicine Available</td></tr>";
                                echo "</table><br><br>";
                            }
                        }
                    
                        // Display unavailable pharmacies
                        if (!empty($unavailable_pharmacies)) {
                            echo "<h2>Unavailable Pharmacies:</h2>";
                            foreach ($unavailable_pharmacies as $pharmacy) {
                                echo "<table border='1'>";
                                echo "<tr><td><label>$pharmacy Pharmacy</label></td></tr>";
                                echo "<tr><td>Medicine Not Available</td></tr>";
                                echo "</table><br><br>";
                            }
                        }
                    
                        $mycon->close();
                    }
                    ?>
                    </center>
                    </form>
        <div class="about-box">ABOUT MEDICINE FINDER</div>
     </div>
<div class="nav">
      <br>
      <br>
      <br>
         <button onclick="location.href='type4.html'">HOME</button>
      <br><br>
        <button onclick="location.href='type5.html'">BACK</button>
       <br><br>
    <button onclick="location.href='type2.html'">NEARBY PHARMACY LOCATOR</button>
    <br><br><br>
    <button onclick="location.href='type3.html'">HEALTH TIPS</button>
    <br><br><br>
    <button onclick="location.href='type4.html'">SYMPTOM CHECKER</button>
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDICINE FINDER</title>
    
    <style>
        body {
            background-image: url(bg.jpeg);
            background-color: rgba(255,255,255,0.2);
            background-blend-mode:lighten;
        
    
}

.wholepage {
    display: flex;
    justify-content: end;
    flex-direction: row;
    position: relative;
    border:3px solid black;  
    margin: 10px;
    
    
}

h1 {
    margin: 20px;
    color: chartreuse;
    background-color: rgba(7, 6, 6,4);
    width: fit-content;
    padding: 20px;
    font-style: italic;
    border-radius: 20px;
}

h4, h3 {
    background-color: orange;
    width: fit-content;
    border: 3px solid black;
    border-radius: 10px;
    padding: 10px;
    margin: 30px;
}



button {
    padding: 10px;
    margin: 20px;
    background-color: rgb(0, 242, 255);
    color: black;
    border-radius: 30px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: larger;
    border: 3px solid black;
    transition: 0.5s ease-in-out;
}

button:hover {
    background-color: white;
  
}

input {
    margin: 10px;
    padding: 10px;
    background-color: azure;
   border-radius: 5px;
}

.label1 {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.container1, .container2 {
    
    width: fit-content;
    height: fit-content;
    background-color: burlywood;
    align-content: center;
    margin: 40px;
    padding: 40px;
    border: 2px solid black ;
    border-radius: 20px;
    transition: ease-in-out 0.5s;
}

.container1:hover, .container2:hover {
    background-color:lightcyan;
   
}
td {
    padding: 10px;
}

table {
    padding: 10px;
    font-size: large;
    border: 2px solid black;
    background-color: wheat;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    margin: 5px;
    border-radius: 15px;
    transition: ease-in-out 1s;
}

table:hover {
    font-size: larger;
    padding: 15px;
}

img {
    width: 150px;
    height: 150px;
    margin: 10px;
    border: 3px solid white;
    border-radius: 20px;
    transition: ease-in-out 0.5s;
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
    background-color: rgba(128, 128 , 128, 0.5);
    animation: bubble 3s infinite;
}

.bubble:nth-child(1) { animation-delay: 0s; left: 10%; }
.bubble:nth-child(2) { animation-delay: 0.5s; left: 30%; }
.bubble:nth-child(3) { animation-delay: 1s; left: 50%; }
.bubble:nth-child(4) { animation-delay: 1.5s; left: 70%; }
.bubble:nth-child(5) { animation-delay: 2s; left: 90%; }

@keyframes bubble {
    0% { transform: translateY(0); opacity: 0; }
    100% { transform: translateY(-100vh); opacity: 1; }
}

#suggestions {
    background-color: lightyellow;
    max-height: 150px;
    overflow-y: auto;
    position: absolute;
    z-index: 1000;
    width: 200px;
}

#suggestions div {
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#suggestions div:hover {
    background-color: #f0c040;
}

#loadingIndicator {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: larger;
    color: white;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 10px;
    border-radius: 5px;
    z-index: 1000;
}
button a{
    text-decoration: none;
}

</style>

<script>
    // Show the loading indicator
    function showLoading() {
        document.getElementById('loadingIndicator').style.display = 'block';
    }

    // Hide the loading indicator
    function hideLoading() {
        document.getElementById('loadingIndicator').style.display = 'none';
    }

    // Reset previous result and show the loading indicator
    function resetResult() {
        // Clear any previous results before resubmission
        document.getElementById('resultSection').innerHTML = '';
        showLoading(); // Ensure the loading indicator is visible
    }

    // Submit the form using AJAX
    function submitForm(event) {
        event.preventDefault(); // Prevent the default form submission
        resetResult(); // Clear previous results and show loading indicator

        let form = event.target;
        let formData = new FormData(form);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true); // Assuming POST request, change if needed
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Hide loading indicator when data is received
                hideLoading();

                // Update the result section with the new data
                document.getElementById('resultSection').innerHTML = xhr.responseText;
            } else {
                hideLoading(); // Hide the loading even if there's an error
                console.error('Error:', xhr.statusText);
            }
        };
        xhr.onerror = function() {
            hideLoading(); // Hide the loading indicator on error
            console.error('Request failed.');
        };

        xhr.send(formData); // Send the form data via AJAX
    }

    // Attach the submit event handler
    document.querySelector('form').addEventListener('submit', submitForm);

    function getSuggestions() {
        let input = document.getElementById('medicinename').value;

        if (input.length < 3) {
            document.getElementById('suggestions').innerHTML = '';
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_suggestions.php?name=' + encodeURIComponent(input), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('suggestions').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    function selectSuggestion(name) {
        document.getElementById('medicinename').value = name;
        document.getElementById('suggestions').innerHTML = '';
    }
</script>



</head>
<body>

   <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>

        <center><h1>MEDI-GUIDE</h1></center>
        
   
        
    <div class="wholepage">
    
    <div class="imagescontainer">
     <marquee direction="down" scrollamount="10">
     <div><img src='story6.jpeg'></div>
     <div><img src='story5.jpeg'></div>
     <div><img src='story4.jpeg'></div>
     <div><img src='story3.jpeg'></div>
     <div><img src='story2.jpeg'></div>
     <div><img src='story1.jpeg'></div>
     </marquee>
    </div>
    
        <center>
        
            <div class="container1">
             <button><a href='userhome1.php'>HOME</a></button>
                <h4>GENERIC MEDICINE FINDER</h4>
                <form method="post" action="" onsubmit="showLoading()">
                    <div>
                        <label>ENTER MEDICINE NAME</label>
                        <input type="text" name="name" id="medicinename"   required onkeyup="getSuggestions()" >
                        <div id="suggestions"></div>
                        <div id="loadingIndicator">Loading...</div> <!-- Loading indicator -->
                    </div>
                    <button type="submit" name="submit" >SEARCH</button>
                   
                    <button type="reset" name="reset" onclick="window.location.href='userhome2.php'">CLEAR</button>
                    <?php
 if (isset($_POST['submit'])) {
    
    $medicinename = $_POST['name'];
    $mycon = mysqli_connect("localhost", "root", "", "mediguide");

    // First query to fetch medicine details
    $sql = "SELECT * FROM alternatives WHERE medicinename='$medicinename'";
    $result = $mycon->query($sql);
    $n = mysqli_num_rows($result);

    if ($n > 0) {
        while ($row = mysqli_fetch_row($result)) {
            echo "<br><br><table border='2'><tr><td>MEDICINE NAME: $row[0]<br></td></tr>";
            
            // Second query to fetch price for the main medicine
            $sql2 = "SELECT * FROM prices WHERE medicinename='$row[0]'";
            $result2 = $mycon->query($sql2);
            $n2 = mysqli_num_rows($result2);

            if($n2 > 0) {
                $row2 = mysqli_fetch_row($result2);
                echo "<tr><td><center>PRICE : RS $row2[2]<br></center></td></tr>";
                echo "</table>";
                echo "<br>";
                echo "<br>";
            } else {
                echo "<table><tr><td><center>No price found for $row[0]<br></center></td></tr></table>";
            }

            // Array to store alternatives and their prices
            $alternatives = [];

            // Loop to fetch alternative medicines and their prices
            for ($i = 1; $i <= 5; $i++) {
                if (!empty($row[$i])) {
                    $altName = $row[$i];

                    // Query to fetch price for each alternative medicine
                    $sql3 = "SELECT * FROM prices WHERE medicinename='$altName'";
                    $result3 = $mycon->query($sql3);
                    $n3 = mysqli_num_rows($result3);

                    if($n3 > 0) {
                        $row3 = mysqli_fetch_row($result3);
                        $price = $row3[2];
                        // Store alternative name and price in the array
                        $alternatives[] = ['name' => $altName, 'price' => $price];
                    } else {
                        // If no price found, store price as null or 0
                        $alternatives[] = ['name' => $altName, 'price' => null];
                    }
                }
            }

            // Sort the alternatives array by price in ascending order
            usort($alternatives, function($a, $b) {
                return $a['price'] <=> $b['price'];
            });

            // Display sorted alternatives
            foreach ($alternatives as $alternative) {
                echo "<table border='2'>";
                echo "<tr><td>ALTERNATIVE MEDICINE NAME: " . $alternative['name'] . "<br></td></tr>";

                if ($alternative['price'] !== null) {
                    echo "<tr><td><center>PRICE : RS " . $alternative['price'] . "<br></center></td></tr>";
                } else {
                    echo "<tr><td>No price found for " . $alternative['name'] . "<br></td></tr>";
                }
                echo "</table>";
                echo "<br>";
                echo "<br>";
            }

            echo "THANK YOU FOR USING OUR APPLICATION";
        }
    } else {
        echo "<br>";
        echo "PLEASE ENTER CORRECT MEDICINE NAME <br>";
        echo "<br>CHECK AVAILABLE IT MAY AVAILABLE IN STORES 👉";
    }

    mysqli_close($mycon);
 }
 ?>

                    
                                    </form>
                                </div>
                                
                                </center>
                               
                                <div class="container2">
                                
                                    <h3>Medicine Availability<br> in Pharmacies</h3>
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
                            echo "";
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
                                </div>
                      
                            </div>
                        </div>
                </div>
                </div>
</body>
</html>
                    

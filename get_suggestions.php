<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mediguide";

$mycon = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mycon->connect_error) {
    die("Connection failed: " . $mycon->connect_error);
}

$suggestions = [];

// Get all tables from the database
$sql_tables = "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbname'";
$result_tables = $mycon->query($sql_tables);

if ($result_tables && $result_tables->num_rows > 0) {
    while ($table = $result_tables->fetch_assoc()) {
        $table_name = $table['table_name'];

        // Check if 'medicinename' column exists in the current table
        $sql_column_check = "SHOW COLUMNS FROM $table_name LIKE 'medicinename'";
        $result_column_check = $mycon->query($sql_column_check);

        // If the column exists, perform the query for suggestions
        if ($result_column_check && $result_column_check->num_rows > 0) {
            // Prepare and sanitize input
            $input = $mycon->real_escape_string($_GET['name']);
            $sql = "SELECT DISTINCT medicinename FROM $table_name WHERE medicinename LIKE '%$input%'";
            $result = $mycon->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $suggestions[] = htmlspecialchars($row['medicinename']);
                }
            }
        }
    }
}

// Output suggestions
foreach ($suggestions as $suggestion) {
    echo "<div onclick=\"selectSuggestion('$suggestion')\">$suggestion</div>";
}

$mycon->close();
?>

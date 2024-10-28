<?php
function createUserTable($username) {
    global $conn;

    // Sanitize pharmacy name to use as table name
    $table_name = "pharmacy_" . preg_replace('/[^A-Za-z0-9_]/', '', $username);


    // Create table for storing medicine details
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        medicinename VARCHAR(255) NOT NULL,
        quantity VARCHAR(255) NOT NULL,
        availability VARCHAR(255) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "<br>";
        
    } else {
        echo "Error creating table: ";
        echo "Pharmacy already exists" . $conn->error;
    }
}
?>

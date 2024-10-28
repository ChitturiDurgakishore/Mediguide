<html>
    <head>
        <title>php</title>
    </head>
    <body>
        <?php
        // Set the maximum execution time to 10 minutes
        set_time_limit(600);

        // Create connection
        $conn = new mysqli("localhost", "root", "", "mediguide");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Path to your CSV file
        $csvFile = 'C:\xampp\htdocs\mediguide\pricesfinal1.csv';

        // Open the file for reading
        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            // Skip the first row (header)
            fgetcsv($handle);

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO prices (id, name, price) VALUES (?, ?, ?)");

            // Bind parameters
            $stmt->bind_param("sss", $id, $name, $price);

            // Read each row of the CSV file
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Assign values to variables
                $id = $data[0];
                $name = $data[1];
                $price = $data[2];

                // Execute the prepared statement
                $stmt->execute();
            }

            // Close the file
            fclose($handle);

            // Close the statement and connection
            $stmt->close();
            $conn->close();

            echo "CSV data successfully imported!";
        } else {
            echo "Error opening the file.";
        }
        ?>
    </body>
</html>

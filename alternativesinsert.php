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
        $csvFile = 'C:\xampp\htdocs\mediguide\alternativefinal.csv';

        // Open the file for reading
        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            // Skip the first row (header)
            fgetcsv($handle);

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO alternatives (name, substitute0, substitute1, substitute2, substitute3, substitute4, use0, use1) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            // Bind parameters
            $stmt->bind_param("ssssssss", $name, $substitute0, $substitute1, $substitute2, $substitute3, $substitute4, $use0, $use1);

            // Read each row of the CSV file
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Assign values to variables
                $name = $data[0];
                $substitute0 = $data[1];
                $substitute1 = $data[2];
                $substitute2 = $data[3];
                $substitute3 = $data[4];
                $substitute4 = $data[5];
                $use0 = $data[7];
                $use1 = $data[8];

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

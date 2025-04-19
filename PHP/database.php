<?php

// Database credentials for XAMPP 
$servername = "localhost";
$username = "root";
$password = ""; // Default XAMPP password 
$dbname = "iss"; // The actual name of your database
$tablename = "iss_missions"; // The actual name of your table

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT * FROM $tablename";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Data</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #e0f7fa;
            transition: background-color 0.3s ease;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>
</head>
<body>

    <h1>Showing Data from Table: <?php echo htmlspecialchars($tablename); ?></h1>

    <?php

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";

        // Fetch column headers dynamically
        $fields = $result->fetch_fields();
        echo "<tr>";
        foreach ($fields as $field) {
            echo "<th>" . htmlspecialchars($field->name) . "</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='no-data'>No data found in the table.</p>";
    }

    // Close the database connection
    $conn->close();

    ?>

</body>
</html>
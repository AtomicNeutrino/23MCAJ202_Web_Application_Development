<?php
    include 'db_connection.php';

    if (isset($_POST['search_book'])) {
        $search_title = $_POST['search_title'];

        $sql = "SELECT * FROM books WHERE title LIKE '%$search_title%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1' style='width: 80%; margin: 20px auto; border-collapse: collapse; background: #fff; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);'>
                    <tr style='background-color: #5cb85c; color: white;'>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Accession Number</th>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Title</th>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Authors</th>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Edition</th>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Publisher</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td style='padding: 10px; border: 1px solid #ddd;'>" . $row['accession_number'] . "</td>
                        <td style='padding: 10px; border: 1px solid #ddd;'>" . $row['title'] . "</td>
                        <td style='padding: 10px; border: 1px solid #ddd;'>" . $row['authors'] . "</td>
                        <td style='padding: 10px; border: 1px solid #ddd;'>" . $row['edition'] . "</td>
                        <td style='padding: 10px; border: 1px solid #ddd;'>" . $row['publisher'] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align: center; color: red;'>No results found.</p>";
        }
        echo "<div style='text-align: center; margin-top: 20px;'>
                <a href='index.php' style='text-decoration: none; background-color: #5cb85c; color: white; padding: 10px 20px; border-radius: 4px;'>Go Back to Home</a>
              </div>";
    }

    $conn->close();
?>
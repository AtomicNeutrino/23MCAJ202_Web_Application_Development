<?php
    include 'db_connection.php';

    if (isset($_POST['add_book'])) {
        $accession_number = $_POST['accession_number'];
        $title = $_POST['title'];
        $authors = $_POST['authors'];
        $edition = $_POST['edition'];
        $publisher = $_POST['publisher'];

        $sql = "INSERT INTO books (accession_number, title, authors, edition, publisher) VALUES ('$accession_number', '$title', '$authors', '$edition', '$publisher')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Book added successfully');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    header("Location: index.php"); // Redirect to the main page after adding the book
    exit(); 
?>
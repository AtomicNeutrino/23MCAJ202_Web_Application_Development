<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "book_db";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->query($sql);

    $conn->select_db($dbname);

    $sql = "CREATE TABLE IF NOT EXISTS books (
        accession_number INT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        authors VARCHAR(255) NOT NULL,
        edition VARCHAR(50) NOT NULL,
        publisher VARCHAR(255) NOT NULL
    )";
    $conn->query($sql);
?>
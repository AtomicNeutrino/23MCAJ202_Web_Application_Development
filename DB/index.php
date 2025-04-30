<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Library Management System</h1>

    <form method="post" action="add_book.php">
        <h2>Add Book Information</h2>
        <label for="accession_number">Accession Number:</label>
        <input type="number" name="accession_number" id="accession_number" required><br>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="authors">Authors:</label>
        <input type="text" name="authors" id="authors" required><br>

        <label for="edition">Edition:</label>
        <input type="text" name="edition" id="edition" required><br>

        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" id="publisher" required><br>

        <input type="submit" name="add_book" value="Add Book">
    </form>

    <form method="post" action="search.php">
        <h2>Search for a Book</h2>
        <label for="search_title">Title:</label>
        <input type="text" name="search_title" id="search_title" required><br>

        <input type="submit" name="search_book" value="Search">
    </form>
</body>
</html>
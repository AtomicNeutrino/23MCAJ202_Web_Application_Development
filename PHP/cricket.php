<?php

// An array to store the names of Indian Cricket players
$indianCricketPlayers = array(
    "Virat Kohli",
    "Rohit Sharma",
    "Jasprit Bumrah",
    "Ravindra Jadeja",
    "Hardik Pandya",
    "KL Rahul",
    "Shubman Gill",
    "Mohammed Siraj",
    "Kuldeep Yadav",
    "Shreyas Iyer",
    "Sanju Samson"


);

// Start the HTML structure with more comprehensive styling
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Indian Cricket Players</title>";
echo "<style>";
echo "body {";
echo "    font-family: 'Arial', sans-serif;";
echo "    background-color:rgb(124, 189, 255);"; /* Light gray background */
echo "    display: flex;";
echo "    justify-content: center;";
echo "    align-items: center;";
echo "    min-height: 100vh;";
echo "    margin: 0;";
echo "}";

echo "table {";
echo "    border-collapse: collapse;";
echo "    width: 90%;"; /* Make table responsive within its container */
echo "    max-width: 800px;"; /* Set a maximum width */
echo "    background-color: #fff;";
echo "    box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);"; /* More pronounced shadow */
echo "    border-radius: 8px;"; /* Rounded corners */
echo "    overflow: hidden;"; /* To contain rounded corners of header */
echo "    margin-bottom: 20px;"; /* Add some bottom margin */
echo "}";

echo "thead {";
echo "    background-color: #007bff;"; /* Primary blue color */
echo "    color: #fff;";
echo "}";

echo "thead th {";
echo "    padding: 15px;";
echo "    text-align: left;";
echo "    font-weight: bold;";
echo "    text-transform: uppercase;"; /* Make header text uppercase */
echo "}";

echo "tbody td {";
echo "    padding: 12px;";
echo "    border-bottom: 1px solid #e0e0e0;"; /* Lighter border */
echo "}";

echo "tbody tr:nth-child(even) {";
echo "    background-color: #f2f2f2;"; /* Slightly darker alternate row */
echo "}";

echo "tbody tr:hover {";
echo "    background-color: #d1ecf1;"; /* Light cyan on hover */
echo "    transition: background-color 0.3s ease;"; /* Smooth hover transition */
echo "}";

echo "h1 {";
echo "    color: #333;";
echo "    margin-bottom: 20px;";
echo "    text-align: center;";
echo "}";
echo "</style>";
echo "</head>";
echo "<body>";

// Heading for the page
echo "<h1>Indian Cricket Team Players     .      .      . </h1>";

// Start the HTML table
echo "<table>";
echo "<thead>";
echo "<tr><th>Player Name</th></tr>"; // Table header
echo "</thead>";
echo "<tbody>";

// Loop through the array and display each player in a table row
foreach ($indianCricketPlayers as $player) {
    echo "<tr><td>" . htmlspecialchars($player) . "</td></tr>"; // Create a table row with a data cell for each player
}

// Close the HTML table
echo "</tbody>";
echo "</table>";

// Close the HTML body and document
echo "</body>";
echo "</html>";

?>
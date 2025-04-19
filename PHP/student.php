<?php

// Initialize an array to store student names
$students = array("Adarsh","Manu", "Bincy", "Chandran", "John","Rahul" );

// Display the original array using print_r
echo "<h2>Original Array:</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Sort the array in ascending order (maintaining index association) using asort
asort($students);

// Display the sorted array using asort
echo "<h2>Array Sorted using asort (Ascending, preserving keys):</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Sort the array in descending order (maintaining index association) using arsort
arsort($students);

// Display the sorted array using arsort
echo "<h2>Array Sorted using arsort (Descending, preserving keys):</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

?>
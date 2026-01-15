<?php 
declare(strict_types=1);

// Include shared header HTML
require "header.php"; 

// Include Car class definition
require "car.php";

// Include database connection
require "connect.php";

// Create a Car object
$car = new Car("Toyota", "Corolla", 2020);

// Display car details
echo "<p>Car: " . $car->getDetails() . "</p>";

// Output instructions message
echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";

/*
Reflection:
I found creating the Car class and using require statements easy
because it followed examples from class. The most challenging part
was setting up the PDO database connection and making sure XAMPP
was configured correctly.
*/

// Include shared footer HTML
require "footer.php";
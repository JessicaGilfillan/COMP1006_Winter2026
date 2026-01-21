//1. Set Up & Start 


//2. Code Commenting 

// <--- Inline Commenting

<?php
/*  <-----

Multi-line Commenting

*/  



//3. Variables, Data Tyoes, Concatenation, Conditional Statements & Echo

$firstName = "Corrado"; // String
$lastName = "Lamberti"; //String
$age = 18; //int
$isInstructor = true; // boolean

echo "<p> Hello there, my name is " . $firstName . " " . $lastName . "</p>"

if ($isInstructor) {
    echo "<p> I am your teacher </p>";
    
}

    else {
        echo "<p> Opps, teach didn't show!"
    }

//4. Loosely Typed Language Demo

$num1 = 1;``
$num2 = "10";

funtion add(int $num1, int $num2) ; int {
    return $num1 + $num2;
}

echo "<p>" . add ($num1, $num2) . "</p>";
//5. Strict Types & Types Hints


//6. OOP with PHP 

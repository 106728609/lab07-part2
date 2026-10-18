<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Confirmation</title>
    <meta charset="utf-8">
</head>
<body>

<h1>Rohirrim Tour Booking Confirmation</h1>

<?php

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$age = $_POST["age"];
$species = $_POST["species"];
$food = $_POST["food"];
$partysize = $_POST["partysize"];
$bookday = $_POST["bookday"];

$error = false;

if ($firstname == "") {
    echo "Please enter your firstname.<br>";
    $error = true;
}

if ($lastname == "") {
    echo "Please enter your lastname.<br>";
    $error = true;
}

if ($age == "" || !is_numeric($age) || $age < 1) {
    echo "Please enter a valid age.<br>";
    $error = true;
}

if (!isset($_POST["accom"]) && !isset($_POST["4day"]) && !isset($_POST["10day"])) {
    echo "Please select a booking option.<br>";
    $error = true;
}

if ($bookday == "") {
    echo "Please enter the date.<br>";
    $error = true;
}

if ($partysize == "" || !is_numeric($partysize) || $partysize < 1) {
    echo "Please enter a valid number of travellers.<br>";
    $error = true;
}

if ($error == false) {

    echo "<p>Welcome $firstname $lastname!</p>";

    $tour = "";

    if (isset($_POST["accom"])) {
        $tour = "One-day tour";
    }

    if (isset($_POST["4day"])) {
        if ($tour != "") {
            $tour = $tour . " and Four-day tour";
        } else {
            $tour = "Four-day tour";
        }
    }

    if (isset($_POST["10day"])) {
        if ($tour != "") {
            $tour = $tour . " and Ten-day tour";
        } else {
            $tour = "Ten-day tour";
        }
    }

    echo "<p>You are now booked on the $tour</p>";
    echo "<p>Age: $age</p>";

    if ($species == "M") {
        echo "<p>Species: Human</p>";
    } else if ($species == "D") {
        echo "<p>Species: Dwarf</p>";
    } else if ($species == "E") {
        echo "<p>Species: Elf</p>";
    } else {
        echo "<p>Species: Hobbit</p>";
    }

    echo "<p>Meal Preference: $food</p>";
    echo "<p>Number of travellers: $partysize</p>";

}

?>

</body>
</html>
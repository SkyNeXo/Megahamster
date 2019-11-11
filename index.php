<?php
//require("Classes/Living/Room.php");
//require("Classes/Living/RectangularRoom.php");
//require("Classes/Living/OctagonalRoom.php");
//Nicht mehr nötigt wegen Autoloader

require("vendor/autoload.php");

use FIS\Megahamster\Living as Living;

$rooms[] = new Living\RectangularRoom("The Flat", 149.00, 80, 50, []);
$rooms[] = new Living\RectangularRoom("The Room", 49.00, 120, 80, ["Food jars"]);
$rooms[] = new Living\OctagonalRoom("The Pit", 69.00, 20, ["Hamster training gloves", "Hamster punching sack"]);

if (isset($_GET['format']) && $_GET['format']==="json") {
    header("content-type:application/json");
    echo json_encode($rooms);
} else {

    echo <<<HTML
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <style>
        .container {
            position: absolute;
            top: 20%;
            box-shadow: 0 0 20px #888888;
            border-top: solid 40px #3399ff;
            border-radius: 4px;
            padding: 40px;
        }
    </style>
</head>
<div class="d-flex justify-content-center">
    <div class="container">
        <h1>Megahamster</h1>
        <table class="table">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Area</th>
                <th>Length</th>
                <th>Width</th>
                <th>Side</th>
                <th>Special Equipment</th>
            </tr>
HTML;
    foreach ($rooms as $room) {
        echo $room->toHtml();
    }
    echo <<<HTML
        </table>
    </div>
</div>
HTML;
}

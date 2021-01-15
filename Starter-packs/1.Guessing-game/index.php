<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);

session_start();

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'classes/GuessingGame.php';

function whatIsHappening() {
    // echo '<h2>$_GET</h2>';
    // var_dump($_GET);
    echo '<h2>$_POST</h2>';
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    // echo '<h2>$_COOKIE</h2>';
    // var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";   
}
whatIsHappening();


// Start the game
// As this game is rather simple, one class should be sufficient

$game = new GuessingGame();

if (isset($_POST["submit"]) && (!empty($_POST["inputNumber"]))){

    $game->run(); 

};


    
echo '<h2>$game</h2>';
echo "<pre>";
var_dump($game);
echo "</pre>";
echo "<br>";

//session_destroy();

require 'view.php';

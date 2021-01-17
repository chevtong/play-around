<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

// Load you classes
require_once 'classes/RockPaperScissors.php';

function whatIsHappening() {
    
    // echo '<h2>$_POST</h2>';
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
   
    echo '<h2>$_SESSION</h2>';
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";   
}
whatIsHappening();

// Start the game
$game = new RockPaperScissors();
$game->run();

//Show the $game obj deatils when building
echo '<h2>$game</h2>';
echo "<pre>";
var_dump($game);
echo "</pre>";
echo "<br>";

//session_destroy();

require 'view.php';

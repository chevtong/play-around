<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// So, you've reached the final stage huh?
// Great job! This means you've earned the freedom to build this exercise from scratch.
// One final word of advice: this game is much more complex, so you might want to use multiple classes in here.

session_start();

require_once 'classes/blackjack.php';


function whatIsHappening() {
    
    echo '<h2>$_POST</h2>';
    //echo "<pre>";
    var_dump($_POST);
    //echo "</pre>";
   
    echo '<h2>$_SESSION</h2>';
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";   
}
whatIsHappening();


// $deck = new Blackjack();
// $deck->run();

//Show the $game obj deatils when building
// echo '<h2>$deck</h2>';
// //echo "<pre>";
// var_dump($deck);
//echo "</pre>";

if (!empty($_POST["userDecision"])){

    switch($_POST["userDecision"]){

        case "start":
            echo "start";
            //create new obj for both parties + calculate the totalValue
            $computer = new Computer();
            $computer->calculateValueComputer();
        
            $player = new User();
            $player->calculateValueComputer();

            //store every info in the session
            $_SESSION['computer'] = serialize($computer);
            $_SESSION['player'] = serialize($player);

            break;

        case "hit":
            echo "hit";
            //get the session info for both parties
            $computer = unserialize($_SESSION['computer']);
            $player = unserialize($_SESSION['player']);

            //give 1 more card to player
            $player->generateCard();
            //update the totalvalue of player
            $player->calculateValueComputer();

            //store info to the sessions
            $_SESSION['computer'] = serialize($computer);
            $_SESSION['player'] = serialize($player);

            break;


        case "hold":
            echo "hold";
            //get the session info for both parties
            $computer = unserialize($_SESSION['computer']);
            $player = unserialize($_SESSION['player']);

            break;
        default: 
            echo "error";


    }

    



   echo '<h2>$computer</h2>';
    echo "<pre>";
    var_dump($computer);
    echo "</pre>";
    echo '<h2>$player</h2>';
    echo "<pre>";
    var_dump($player);
    echo "</pre>";
    
   

    

}


//TODO: click on hit btn - 1 card to player

//TODO: click on hold btn - compare the cards





//session_destroy();

require 'view.php';


<?php

session_start();

class GuessingGame
{
    public $maxGuesses;
    public $secretNumber;
    public $result;
    public $attempts = 0;

    // set a default amount of max guesses
    public function __construct(int $maxGuesses = 3)
    {
        // We ask for the max guesses when someone creates a game
        // Allowing your settings to be chosen like this, will bring a lot of flexibility
        $this->maxGuesses = $maxGuesses;
        
        if(!empty($_SESSION["attempts"])){
            $this->attempts = $_SESSION["attempts"];
        }
        
       
    }

    public function run()
    {
        // This function functions as your game "engine"
        // It will run every time, check what needs to happen and run the according functions (or even create other classes)

        // TODO: check if a secret number has been generated yet
        // --> if not, generate one and store it in the session (so it can be kept when the user submits the form)
        if (empty($this->secretNumber)){
            $this->generateSecretNumber(); 
        }

        // TODO: check if the player has submitted a guess
        if (!empty($_POST["inputNumber"]) ){

            $this->attempts++;  




            if($_POST["inputNumber"] == $this->secretNumber){
                $this->playerWins();
            } else if ($_POST["inputNumber"] < $this->secretNumber) {
                $this->higher();
            } else if ($_POST["inputNumber"] > $this->secretNumber) {
                $this->lower();
            } 

           
        // --> if so, check if the player won (run the related function) or not (give a hint if the number was higher/lower or run playerLoses if all guesses are used).
        // TODO as an extra: if a reset button was clicked, use the reset function to set up a new game
        }

        $_SESSION["attempts"] = $this->attempts;
        var_dump($_SESSION["attempts"]);
        var_dump($this->attempts);

        if($this->attempts > 3){
            $this->playerLoses();
        }

    }

    public function generateSecretNumber()
    {
        $this->secretNumber = rand(1,10);
        $_SESSION["secretNumber"] = $this->secretNumber;

    }
    public function higher()
    {
        $this->result = "higher";
    }
    public function lower()
    {
        $this->result = "lower";
    }

    public function playerWins()
    {
        // TODO: show a winner message (mention how many tries were needed)
        $this->result = "win";
       
    }

    public function playerLoses()
    {
        // TODO: show a lost message (mention the secret number)
        
        $this->result = "lose";
        $this->reset();

        

         
    }

    public function reset()
    {   
        // TODO: Generate a new secret number and overwrite the previous one

        $_SESSION["attempts"] = 0;
        $this->attempts = 0;
    }
}


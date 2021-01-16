<?php


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

        if(!empty($_SESSION["secretNumber"])){
            $this->secretNumber = $_SESSION["secretNumber"];
        } 
    }

    public function run()
    {
        // This function functions as your game "engine"
        // It will run every time, check what needs to happen and run the according functions (or even create other classes)

        if (empty($this->secretNumber)){
            $this->generateSecretNumber(); 
        }

        if (!empty($_POST["inputNumber"]) ){

            $this->attempts++;  

            if($_POST["inputNumber"] == $this->secretNumber){

                $this->playerWins();
                $this->generateSecretNumber();
                $this->reset();

            } else if ($_POST["inputNumber"] < $this->secretNumber) {

                $this->higher();

            } else if ($_POST["inputNumber"] > $this->secretNumber) {

                $this->lower();
            } 

        }

        //if the user enter the correct number in the last attempts, 
        //the above compparasion will still run first before change the secret number
        $_SESSION["attempts"] = $this->attempts;
        if($this->attempts == $this->maxGuesses){

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
        $this->result = "win!  <br> The secret number is {$this->secretNumber}";
        $this->reset();
    }

    public function playerLoses()
    {
        $this->result = "lose, <br> The secret number is {$this->secretNumber} ";
        $this->reset();
    }
   
  
    public function allAttemptsUsed()
    {
    return "All attempts are used, play again?";
    }
  
    public function reset()
    {   
       // echo "reset";
        $this->attempts = 0;
        $_SESSION["attempts"] = 0;   
        $this->generateSecretNumber();

        
    }
}


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
        
        //TODO: problem is updating session attempts, double check is it necessary for session
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

        // --> if not, generate one and store it in the session (so it can be kept when the user submits the form)
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

        // --> if so, check if the player won (run the related function) or not (give a hint if the number was higher/lower or run playerLoses if all guesses are used).
        // TODO as an extra: if a reset button was clicked, use the reset function to set up a new game
        }

        // TODO: check if the user win in the last attampt, is it working well?
        $_SESSION["attempts"] = $this->attempts;
        if($this->attempts == $this->maxGuesses){

            $this->playerLoses(); 
            $this->reset(); 
            $this->generateSecretNumber();
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
        $this->result = "win!  <br> The secret number is {$this->secretNumber} <br> Want to try again?";
    }

    public function playerLoses()
    {
        $this->result = "lose, <br> The secret number is {$this->secretNumber} <br> Want to try again?";
        
    }
   
    public function allAttemptsUsed()
    {
    return "(All attempts are used, you can restart again)";
    }
  
    public function reset()
    {   
        echo "reset";
        $this->attempts = 0;
        $_SESSION["attempts"] = 0;   
        
    }
}


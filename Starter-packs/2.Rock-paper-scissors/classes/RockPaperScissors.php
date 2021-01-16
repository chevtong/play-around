<?php

class RockPaperScissors
{
    //TODO: set variables
    public $computerChoice;
    public $userChoice;
    public $result;
    
    public function __construct()
    {
        if(empty($this->computerChoice)){
            $this->GenerateComputerChoice();
        }
    }


    public function run()
    {
        // This function functions as your game "engine"
        // Now it's on to you to take the steering wheel and determine how it will work

        //TODO: compare the guess
        //0 = rock, 1=paper,2=scrissors 
        if (isset($_POST["userChoice"])){

            $this->userChoice = $_POST["userChoice"];



            if ($this->computerChoice == $this->userChoice){
                $this->tie();
            } else if ($this->computerChoice == 0 && $this->userChoice == 1){
                $this->winGame();
            } else if ($this->computerChoice == 0 && $this->userChoice == 2){
                $this->loseGame();
            } else if ($this->computerChoice == 1 && $this->userChoice == 2){
                $this->winGame();
            } else if ($this->computerChoice == 1 && $this->userChoice == 0){
                $this->loseGame();
            } else if ($this->computerChoice == 2 && $this->userChoice == 0){
                $this->winGame();
            } else if ($this->computerChoice == 2 && $this->userChoice == 1){
                $this->loseGame();
            }
        }
    }

    //TODO: function - generate computer choice
    public function GenerateComputerChoice()
    {
        $this->computerChoice = rand(0,2);

    }



    //TODO: function - user win
    public function winGame()
    {
        $this->result = "WIN";
    }

     //TODO: function - user lose
     public function loseGame()
     {
         $this->result = "LOSE";
     }

     public function tie()
     {
         $this->result = "It's a tie.";
     }

     //TODO: function - restart
}
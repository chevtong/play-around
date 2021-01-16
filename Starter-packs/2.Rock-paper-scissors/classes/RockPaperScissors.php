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
        


        //TODO: display userchoice n computer choice
    

        //TO COMPARE: 0 = rock, 1=paper,2=scrissors 
        if (isset($_POST["userChoice"])){

            $this->userChoice = $_POST["userChoice"];

            if (!empty($this->userChoice)){
                $this->userChoiceDisplay();
            }


            if ($this->computerChoice == $this->userChoice){
                $this->tie();
            } else if ($this->computerChoice == 1 && $this->userChoice == 2){
                $this->winGame();
            } else if ($this->computerChoice == 1 && $this->userChoice == 3){
                $this->loseGame();
            } else if ($this->computerChoice == 2 && $this->userChoice == 3){
                $this->winGame();
            } else if ($this->computerChoice == 2 && $this->userChoice == 1){
                $this->loseGame();
            } else if ($this->computerChoice == 3 && $this->userChoice == 1){
                $this->winGame();
            } else if ($this->computerChoice == 3 && $this->userChoice == 2){
                $this->loseGame();
            }
        }
    }

    public function GenerateComputerChoice()
    {
        $this->computerChoice = rand(1,3);
    }

    public function winGame()
    {
        $this->result = "WIN";
    }

    public function loseGame()
    {
        $this->result = "LOSE";
    }

    public function tie()
    {
        $this->result = "It's a tie.";
    }
    public function userChoiceDisplay()
    {
        if ($this->userChoice == 2){
            echo "You chose PAPER";
        } else if ($this->userChoice == 3){
            echo "You chose SCISSORS";
        } else  {
            echo "You chose STONE";
        }
    }

     //TODO: function - restart if needed?

     //TODO: add the marks, 3 round 2 wins?
    
}
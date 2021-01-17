<?php

class RockPaperScissors
{
    //TODO: set variables
    public $computerChoice;
    public $computerChoiceDisplay;
    public $userChoice;
    public $userChoiceDisplay;
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
        if (!empty($_POST["userChoice"])){

            $this->userChoice = $_POST["userChoice"];

            if (!empty($this->userChoice)){
                $this->userChoiceDisplay();
            }
            if (!empty($this->computerChoice)){
                $this->computerChoiceDisplay();
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
            $this->userChoiceDisplay = "You chose PAPER";
        } else if ($this->userChoice == 3){
            $this->userChoiceDisplay =  "You chose SCISSORS";
        } else  {
            $this->userChoiceDisplay =  "You chose STONE";
        }
    }

    public function computerChoiceDisplay()
    {
        if ($this->computerChoice == 2){
            $this->computerChoiceDisplay = "Computer chose PAPER";
        } else if ($this->userChoice == 3){
            $this->computerChoiceDisplay =  "Computer chose SCISSORS";
        } else  {
            $this->computerChoiceDisplay =  "Computer chose STONE";
        }
    }

     //TODO: function - restart if needed?

     //TODO: add the marks, 3 round 2 wins?
    
}
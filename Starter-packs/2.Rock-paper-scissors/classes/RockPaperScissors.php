<?php

class RockPaperScissors
{
    public $computerChoice;
    public $computerChoiceDisplay;
    public $computerScore;

    public $userChoice;
    public $userChoiceDisplay;
    public $userScore;

   // public $round;
    public $roundResult;
    public $overAllResult;



    
    public function __construct()
    {
        if(empty($this->computerChoice)){
            $this->GenerateComputerChoice();
        }

        if(!empty($_SESSION["computerScore"])){
            $this->computerScore = $_SESSION["computerScore"];
        }

        if(!empty($_SESSION["userScore"])){
            $this->userScore = $_SESSION["userScore"];
        }

        

        // if(!empty($_SESSION["round"])){
        //     $this->round = $_SESSION["round"];
        // }
    }


    public function run()
    {  
        if (!empty($_POST["restart"]) && ($_POST["restart"] == "restart")){
            $this->reset();
        }

        //TO COMPARE: 0 = rock, 1=paper,2=scrissors 
        if (!empty($_POST["userChoice"])){

            $this->userChoice = $_POST["userChoice"];

            // display the user and computer choices
            if (!empty($this->userChoice)){
                $this->userChoiceDisplay();
            }
            if (!empty($this->computerChoice)){
                $this->computerChoiceDisplay();
            }

            // $this->round++;
            // $_SESSION["round"]=$this->round;

            //compare the weapons on every round
            if ($this->computerChoice == $this->userChoice){
                $this->tie();
            } else if ($this->computerChoice == 1 && $this->userChoice == 2){
                $this->userAddScore();
            } else if ($this->computerChoice == 1 && $this->userChoice == 3){
                $this->computerAddScore();
            } else if ($this->computerChoice == 2 && $this->userChoice == 3){
                $this->userAddScore();
            } else if ($this->computerChoice == 2 && $this->userChoice == 1){
                $this->computerAddScore();
            } else if ($this->computerChoice == 3 && $this->userChoice == 1){
                $this->userAddScore();
            } else if ($this->computerChoice == 3 && $this->userChoice == 2){
                $this->computerAddScore();
            }

            //compare the scores to have 2wins in 3 rounds
            if (!empty($this->userScore) && ($this->userScore == 2)){
                $this->overAllResult = "YOU WIN THE GAME!! ";
                //$this->reset();
            } else if (!empty($this->computerScore) && ($this->computerScore == 2)){
                $this->overAllResult = "YOU LOSE THE GAME!! ";
               // $this->reset();
            }

        } 


    }

    public function GenerateComputerChoice()
    {
        $this->computerChoice = rand(1,3);
    }

    public function userChoiceDisplay()
    {
        if ($this->userChoice == 2){
            $this->userChoiceDisplay = "You chose PAPER";
        } else if ($this->userChoice == 3){
            $this->userChoiceDisplay =  "You chose SCISSORS";
        } else if ($this->userChoice == 1) {
            $this->userChoiceDisplay =  "You chose STONE";
        }
    }

    public function computerChoiceDisplay()
    {
        if ($this->computerChoice == 2){
            $this->computerChoiceDisplay = "Computer chose PAPER";
        } else if ($this->computerChoice == 3){
            $this->computerChoiceDisplay =  "Computer chose SCISSORS";
        } else if ($this->computerChoice == 1){
            $this->computerChoiceDisplay =  "Computer chose STONE";
        }
            
        
    }

    public function userAddScore()
    {
        $this->roundResult = "This round, you win";

        $this->userScore++; 
        $_SESSION["userScore"] = $this->userScore;
    }

    public function computerAddScore()
    {
        $this->roundResult = "This round, you lose";
        $this->computerScore++;
        $_SESSION["computerScore"] = $this->computerScore;
    }

    public function tie()
    {
        $this->roundResult = "It's a tie.";
    }
   

     //TODO: want to keep the score display on view.php
     //show restart btn, and need to press the btn to reset()
    public function reset()
    {
        $this->computerScore = 0;
        $_SESSION["computerScore"] = $this->computerScore;

        $this->userScore = 0;
        $_SESSION["userScore"] = $this->userScore;

    }


    
}
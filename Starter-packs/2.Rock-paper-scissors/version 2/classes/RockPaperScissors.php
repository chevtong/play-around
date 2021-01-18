<?php

class RockPaperScissors
{
   public $userChoice;
   public $userScore;

   public $computerChoice;
   public $computerChoiceLetter;
   public $computerChoiceImg;
   public $computerScore;

   public $roundResult;
   public $overAllResult;

   
   public function __construct()
   {
     if(empty($this->computerChoice)){
         $this->generateComputerChoice();
     }

     if(!empty($_SESSION["computerScore"])){
        $this->computerScore = $_SESSION["computerScore"];
    }

    if(!empty($_SESSION["userScore"])){
        $this->userScore = $_SESSION["userScore"];
    }
   }

    public function run(){
        
        if($this->userChoice == $this->computerChoice){
            $this->tie();
        } else if($this->userChoice == 1 && $this->computerChoice == 2){
            $this->computerAddScore();
        } else if($this->userChoice == 1 && $this->computerChoice == 3){
            $this->userAddScore();
        } else if($this->userChoice == 2 && $this->computerChoice == 3){
            $this->computerAddScore();
        } else if($this->userChoice == 2 && $this->computerChoice == 1){
            $this->userAddScore();
        } else if($this->userChoice == 3 && $this->computerChoice == 1){
            $this->computerAddScore();
        } else if($this->userChoice == 3 && $this->computerChoice == 2){
            $this->userAddScore();
        }

        //compare the scores to have 2wins in 3 rounds
        if (!empty($this->userScore) && ($this->userScore == 2)){
            $this->overAllResult = "YOU WIN THE GAME!! ";
            //also set the display of restart button on view.php
        } else if (!empty($this->computerScore) && ($this->computerScore == 2)){
            $this->overAllResult = "YOU LOSE THE GAME!! ";
            //also set the display of restart button on view.php
        }
    }
 
    public function generateComputerChoice(){

        $this->computerChoice = rand(1,3);

        if ($this->computerChoice == 1) {
            $this->computerChoiceLetter = "Computer chose STONE"; 
            $this->computerChoiceImg = "<img src='img/rock-computer.png' alt='stone'>";

        } else if ($this->computerChoice == 2) {
            $this->computerChoiceLetter = "Computer chose PAPER"; 
            $this->computerChoiceImg = "<img src='img/paper-computer.png' alt='paper'>";

        } else if ($this->computerChoice == 3) {
            $this->computerChoiceLetter = "Computer chose SCISSORS"; 
            $this->computerChoiceImg = "<img src='img/scissors-computer.png' alt='scissors'>";
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

    public function reset()
    {
        $this->computerScore = 0;
        $_SESSION["computerScore"] = 0;

        $this->userScore = 0;
        $_SESSION["userScore"] = 0;

        $this->computerChoiceImg = "<img src='img/consider.png' alt='waiting'>";
    }
}

class Rock extends RockPaperScissors 
{
    public $userChoice = "1";
    public $userChoiceDisplay = "You chose ROCK";
    public $userChoiceImg = "<img src='img/rock-player.png' alt='rock'>";  
}

class Paper extends RockPaperScissors 
{
    public $userChoice = "2";
    public $userChoiceDisplay = "You chose PAPER";
    public $userChoiceImg = "<img src='img/paper-player.png' alt='paper'>";
}
class Scissors extends RockPaperScissors 
{
    public $userChoice = "3";
    public $userChoiceDisplay = "You chose SCISSORS";
    public $userChoiceImg = "<img src='img/scissors-player.png' alt='scissors'>";
}
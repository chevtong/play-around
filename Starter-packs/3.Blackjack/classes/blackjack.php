<?php 

class Blackjack
{
    public $cardArray;
    public $blackJackAnnounce;
    public $result;

    public function __construct()
    {   
        if(empty($this->cardArray)){

            $this->startGame();

        }        
    }

    public function run()
    {
        //TODO:compare the cards

    }  

    public function startGame()
    {

        $this->cardArray = [];
        array_push($this->cardArray, rand(1, 11), rand(1, 11));
    }

    public function generateCard()
    {
        array_push($this->cardArray, rand(1, 11));
    }

    public function compareCard()
    {
        //get the totalValue from session
        $this->totalValueUser = $_SESSION["totalValueUser"];
        $this->totalValueComputer = $_SESSION["totalValueComputer"];

        //comparison
        if($this->totalValueUser == 21){
            $this->result = "WIN you have 21!";
        } else if ($this->totalValueUser > 21){
            $this->result = "BUST... ";
        } else if ($this->totalValueComputer > 21){
            $this->result = "computer over 21, you WIN!";
        } else if($this->totalValueUser == $this->totalValueComputer){
            $this->result = "LOSE! same point as dealer";
        } else if($this->totalValueUser < $this->totalValueComputer){
           $this->result = "LOSE! you've got lower than dealer";
        } else if($this->totalValueUser > $this->totalValueComputer){
            $this->result = "WIN! you've got higher than dealer";
        }
    }

   



}

class Computer extends Blackjack
{
    public $totalValueComputer;
    public $decisionComputer;
    
    public function __construct(){
       
        parent::__construct();
      
    }

    public function calculateValueComputer()
    { 
        $this->totalValueComputer = array_sum($this->cardArray);

        if ($this->totalValueComputer == 21){
            $this->blackJackAnnounce = "Computer BlackJack";
        }

        //store the totalvalue in session everytime, for the compare function
        $_SESSION["totalValueComputer"] = $this->totalValueComputer;
    }

     //check computer has blackjack(21) once the game is started
     public function checkBlackJack()
     {
       
         if ($this->totalValueComputer == 21){
             $this->blackJackAnnounce = "Computer BlackJack";
         } 
     }

     //After the players turn, 
     //the dealer can decide to have one more card if the total amount is lower than the player
     public function considerAddCard()
     {
        //get the totalValue from session
        $this->totalValueUser = $_SESSION["totalValueUser"];
        $this->totalValueComputer = $_SESSION["totalValueComputer"];

        //first, to meet the condition (totalValueUser > totalValueComputer)
         if ($this->totalValueUser > $this->totalValueComputer){
             
            //second, use a random number to get computer's decision
            $this->decisionComputer = rand(1,2);
            echo "computer decision: ". $this->decisionComputer;

            if($this->decisionComputer == 1){
                //echo "computer get a card";
                $this->generateCard();   
                $this-> calculateValueComputer();
            } //else if ($this->decisionComputer == 2) {
                //echo "computer wont get card";
            //}

         }

        
     }

    //If the player stops, 
    //the dealer gets as many turns as needed to either win or go bust
    public function computerFinalDecision()
    {
        echo "computerFinalDecision function";
        $this->totalValueComputer = $_SESSION["totalValueComputer"];

        while ($this->totalValueComputer < 21){
            $this->generateCard();
            $this->calculateValueComputer();

            if($this->totalValueComputer >= 18){
                break;
            }
        }
    }


   
}

class User extends Blackjack
{
    public $totalValueUser;
    

    public function __construct(){
        parent::__construct();
       
    }

    public function calculateValueComputer()
    { 
        $this->totalValueUser = array_sum($this->cardArray);
     
        //store the totalvalue in session everytime, for the compare function
        $_SESSION["totalValueUser"] = $this->totalValueUser;
    }

    //check computer has blackjack(21) once the game is started
    public function checkBlackJack()
    {
     
        if ($this->totalValueUser == 21){
            $this->blackJackAnnounce = "User BlackJack";
        } 

        //TODO: end game
    }

}










?>
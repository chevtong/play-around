<?php 

require_once 'blackjack.php'; 

class Computer extends Blackjack
{
    public $totalValueComputer;
    public $decisionComputer;
    
    public function __construct(){
       
       parent::__construct();
    }

    public function calculateValueComputer()
    { 
        //use array_sum to check the total values
        $this->totalValueComputer = array_sum($this->cardArray);

        //store the totalvalue in session everytime, for the compare function
        $_SESSION["totalValueComputer"] = $this->totalValueComputer;        
    }

    //After the players turn, 
    //the dealer can decide to have one more card if the total amount is lower than the player
    public function considerAddCard()
    {
        //get totalValue from session
        $this->totalValueUser = $_SESSION["totalValueUser"];
        $this->totalValueComputer = $_SESSION["totalValueComputer"];

        //first, meet the condition (totalValueUser > totalValueComputer)
        if ($this->totalValueUser > $this->totalValueComputer){
             
            //second, use a random number to get computer's decision
            $this->decisionComputer = rand(1,2);
            //echo "computer decision: ". $this->decisionComputer;

            if($this->decisionComputer == 1){
                //echo "computer get a card";
                $this->generateCard();   
                $this->calculateValueComputer();
            } //else if ($this->decisionComputer == 2) {
                //echo "computer wont get card";
            //}
        }        
    }

    //If the player stops, 
    //the dealer gets as many turns as needed to either win or go bust
    public function computerFinalDecision()
    {
        $_SESSION["totalValueComputer"] = $this->totalValueComputer;

        if ($this->totalValueComputer < 16){
            $this->generateCard();
            $this->calculateValueComputer();
        }
    }
}
?>
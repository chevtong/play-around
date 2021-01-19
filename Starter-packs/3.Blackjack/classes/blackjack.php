<?php 

class Blackjack
{
     public $cardArray;

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

    public function compareCard()
    {
        //get the totalValue from session
        $this->totalValueUser = $_SESSION["totalValueUser"];
        $this->totalValueComputer = $_SESSION["totalValueComputer"];

        //comparison
        if($this->totalValueUser == 21){
            echo "Black Jack";
        } else if ($this->totalValueUser > 21){
            echo "over 21... ";
        }   else if($this->totalValueUser < $this->totalValueComputer){
           echo "LOSE! you've got lower than dealer";
        } else if($this->totalValueUser > $this->totalValueComputer){
            echo "WIN! you've got higher than dealer";
        }
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

}

class Computer extends Blackjack
{
    public $totalValueComputer;
    
    public function __construct(){
        parent::__construct();
        
    
    }

    public function calculateValueComputer()
    { 
        $this->totalValueComputer = array_sum($this->cardArray);
        //store the totalvalue in session everytime, for the compare function
        $_SESSION["totalValueComputer"] = $this->totalValueComputer;
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

}










?>
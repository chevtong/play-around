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
    }

    



   
}










?>
<?php 

class Blackjack
{
    //TODO: set variables
    //computer cards + total value (session)
    

    public $cardArray;
    //public $totalValue;


    //TODO: construct ($computercard)
    public function __construct()
    {   
        if(empty($this->cardArray)){

            $this->startGame();

        }

        
        
        // $this->randomCard = $this->cardComputer;
    }

    public function run()
    {
        //TODO:compare the cards
       // $this->totalValue = array_sum($this->cardArray);
    }

    //TODO: getrandomcard function 
    public function generateCard()
    {
              
    }

    public function startGame()
    {

        $this->cardArray = [];
        array_push($this->cardArray, rand(1, 11), rand(1, 11));
    }

   



}
//TODO: class for user
//TODO: variables : cards, totalvalue (all need to store in session)
//TODO:construct with 2 cards 
class Computer extends Blackjack
{
    //public $cardComputer;
    public $totalValueComputer;
    

    public function __construct(){
        parent::__construct();
        
    
    }

    public function run()
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

    public function run()
    { 
        //TODO: cant store the card Array in the session 
        //$this->cardArray = $_SESSION["cardArray"];
        if (!empty($this->cardArray)){
            //$this->cardArray = $_SESSION["cardArray"];
        }

        if(!empty($this->cardArray)){
            $this->totalValueUser = array_sum($this->cardArray);
            $_SESSION["totalValueUser"] = $this->totalValueUser;
        }
      
    }



   
}










?>
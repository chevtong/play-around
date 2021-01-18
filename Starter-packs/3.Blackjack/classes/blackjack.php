<?php 

class Blackjack
{
    //TODO: set variables
    //computer cards + total value (session)
    

    public $randomCard1;
    public $randomCard2;

    public $cardArray;
    public $totalValue;


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
        $this->totalValue = array_sum($this->cardArray);
    }

    //TODO: getrandomcard function 
    public function generateCard()
    {
              
    }

    public function startGame()
    {
        $this->randomCard1 = rand(1, 11);
        $this->randomCard2 = rand(1, 11);  
        $this->cardArray = [];
        array_push($this->cardArray, $this->randomCard1, $this->randomCard2);
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











?>
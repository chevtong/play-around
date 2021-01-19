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
            $this->result = "over 21... ";
        } else if ($this->totalValueComputer > 21){
            $this->result = "computer over 21, you WIN!";
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
    }

}










?>
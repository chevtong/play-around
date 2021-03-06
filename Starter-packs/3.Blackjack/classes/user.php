<?php 

require_once 'blackjack.php';


class User extends Blackjack
{
    public $totalValueUser;
    public $cardImg;
    

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
            $this->blackJackAnnounce = "Player BlackJack!";
        } 
    }
}


?>
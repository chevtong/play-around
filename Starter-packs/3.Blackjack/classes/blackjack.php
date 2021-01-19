<?php 

//TODO: separate class to different files?

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












?>
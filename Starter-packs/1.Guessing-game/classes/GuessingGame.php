<?php 


class GuessingGame
{

    public $secretNum;
    public $numInput; 
    public $result;
    public $guess = 0;
    public $maxGuess;



    public function __construct()
    {
        if(!empty($_SESSION["maxGuess"])){

            $this->maxGuess = $_SESSION["maxGuess"];

        } else if(empty($_SESSION["maxGuess"]) && !empty($_POST["maxGuess"])){
           
          $this->maxGuess = $_POST["maxGuess"];
          $_SESSION["maxGuess"] = $this->maxGuess;
        }  
         

        if(!empty($_SESSION["secretNum"])){

            $this->secretNum = $_SESSION["secretNum"];

        } else {

            $this->generateSecretNum();
        }

        if(!empty($_POST["inputNumber"])){
           $this->numInput = $_POST["inputNumber"];
        }

        if(!empty($_SESSION["guess"])){
            $this->guess = $_SESSION["guess"];
        }

        
    }



    public function generateSecretNum()
    {
        $this->secretNum = rand(1, 10);
        $_SESSION["secretNum"] = $this->secretNum;
    }


    public function compare(){

        if(!empty($this->numInput)){

            $this->guess++;
            $_SESSION["guess"]=$this->guess;

            if($this->numInput == $this->secretNum){
                $this->playerWin();       
            } else if($this->numInput < $this->secretNum){
                $this->low();
            } else if($this->numInput > $this->secretNum){
                $this->high();
            }

            
            if ($this->guess == $this->maxGuess){
                $this->playerLose();
            }

           
        }





        
    }

    
    public function playerWin()
    {
        $this->result = "WIN";
       
        $this->restart();
    }

    public function playerLose()
    {
        $this->result = "LOSE, start again by choosing the level";
        $this->restart();

    }

    public function high()
    {
        $this->result = "too high";
    }

    public function low()
    {
        $this->result = "too low";
    }
   
    //TODO: need to reset the maxGuesses session
    public function restart()
    {
        $this->guess = 0;

        $_SESSION["guess"]=$this->guess;

        $this->maxGuess = "";
        $_SESSION["maxGuess"] = $this->maxGuess;

        $this->generateSecretNum();
    }
}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Casino royale - guessing game</title>

	
</head>
<body>

	<form action="index.php" method="post">
	Guess A Number (1-10)<br> You have 3 attempts to try it out!<br>
	<input type="number" max="10" name="inputNumber"><br>
	<input type="submit" name="submit" value="<?php  
		if(($game->attempts == 0) && !empty($_POST["submit"])){ 
			echo "RESTART"; 
		} else {
			echo "SUBMIT";} //to change the text of the input inside value attribute from submit to restart?>" >
	</form>
	

	<h3>Your Choice: <?php if(isset($_POST["inputNumber"])){echo $_POST["inputNumber"];}?></h3>
	<p> Attempts: <?php if(!empty($game->attempts)){ 
		echo $game->attempts;
	} else if ((isset($_POST["submit"])) && ($game->attempts == 0)){ 
		echo $game->allAttemptsUsed();
	} ?></p>
	<p>Result: <?php if(!empty($game->result)){ echo $game->result;} ?></p>
	
	

</body>
</html>
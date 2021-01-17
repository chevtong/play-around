<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Casino royale - rock, paper, scissors</title>

	<style>
	img{
		width:5rem;
	}
	button{
		outline:none;
		border: none;
		border-radius: 50%;
		width: 6rem;
		height: 6rem;
	}

	button:focus{
		background-color: #333;
	}
	</style>
</head>
<body>

<form action="index.php" method="post">
<h1>Rock Paper Scissors</h1>

<button name="userChoice" value="1"><img src="img/stone.png" alt="rock"></button>
<button name="userChoice" value="2"><img src="img/paper.png" alt="paper"></button>
<button name="userChoice" value="3"><img src="img/scissors.png" alt="scissors"></button>


<button name="restart" value="restart" <?php if(empty($game->overAllResult)){echo "disabled";}  ?>
>RESTART</button>
</form>

<!-- display the overall result -->
<h3><?php if(!empty($game->overAllResult)){ 
	echo $game->overAllResult; 
	 ?>

<?php }
?></h3>


<!-- display userChoice -->
<p><?php if(!empty($game->userChoiceDisplay)){ 
	echo $game->userChoiceDisplay;
} ?></p>

<!-- display computer Choice -->
<p><?php if(!empty($game->computerChoiceDisplay)){ 
	echo $game->computerChoiceDisplay;
} ?></p>

	

	<!-- display result -->
<p><?php if(!empty($game->roundResult)){ 
	echo $game->roundResult;
} ?></p>

<!-- display user scores --> 
<p>Your Score: <?php if(!empty($game->userScore)){ 
	echo $game->userScore; 
} else {
	echo "0";
} ?></p>

<!-- display computer scores --> 
<p>Computer Score: <?php if(!empty($game->computerScore)){ 
	echo $game->computerScore;
} else { echo "0"; }?></p>

	








<!-- display ROUND --> 
<p><?php //if(!empty($game->round)&& !empty($game->round)){ 
	//echo "ROUND: {$game->round}";
//} ?></p>

</body>
</html>
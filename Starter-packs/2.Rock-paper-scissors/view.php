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

</form>



<!-- display userChoice -->
<p><?php if(!empty($game->userChoiceDisplay)){ 
	echo $game->userChoiceDisplay;
} ?></p>

<!-- display computer Choice -->
<p><?php if(!empty($game->computerChoiceDisplay)){ 
	echo $game->computerChoiceDisplay;
} ?></p>

<!-- display result -->
<p><?php if(!empty($game->result)){ 
	echo $game->result;
} ?></p>

<!-- TODO: display scores --> 

</body>
</html>
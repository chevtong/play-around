<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Casino royale - rock, paper, scissors</title>

    <style>
    img {
        width: 5rem;
    }

    button {
        outline: none;
        border: none;
        border-radius: 50%;
        width: 6rem;
        height: 6rem;
    }

    button:focus {
        background-color: #333;
    }

	button:disabled {
        opacity: .5;
    }

	.table{
		height: 30vh;
		background-color: grey;
	}
    </style>
</head>

<body>

<h1>Rock Paper Scissors</h1>

<div class="table">

<!-- display user weapon -->
<?php if(!empty($game->userChoiceImg)){
	echo $game->userChoiceImg;
} 
?>

<!-- display computer weapon,  img tag will not appear till userChoice is entered -->
<?php if(!empty($game->computerChoiceImg) ){
	echo $game->computerChoiceImg;
} 
?>


</div>

    <form action="index.php" method="post">
        <button name="userChoice" value="1" <?php if(!empty($game->overAllResult)){echo "disabled";}  ?> >
			<img src="img/stone.png" alt="rock" ></button>
        <button name="userChoice" value="2" <?php if(!empty($game->overAllResult)){echo "disabled";}  ?> >
			<img src="img/paper.png" alt="paper"></button>
        <button name="userChoice" value="3" <?php if(!empty($game->overAllResult)){echo "disabled";}  ?> >
			<img src="img/scissors.png" alt="scissors"></button>

        <button name="restart" value="restart"
            <?php if(empty($game->overAllResult)){echo "disabled";}  ?>>RESTART</button>
    </form>

    <!-- display the overall result -->
    <h3><?php if(!empty($game->overAllResult)){ 
	echo $game->overAllResult; 
}?></h3>


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

</body>

</html>
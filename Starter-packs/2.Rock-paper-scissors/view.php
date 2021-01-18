<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="style.css">
    <title>Casino royale - rock, paper, scissors</title>

<style>

</style>

</head>

<body>

    <h1>Rock &#8226; Paper &#8226; Scissors</h1>

    <div class="container">

        
		<div class="userScore">
			<!-- display user scores -->
			<p>Your Score: <br> 
				<span class="score"> <?php if(!empty($game->userScore)){ 
									echo $game->userScore; 
								} else {
									echo "0";
								} ?></span></p>
			

			
			<!-- display userChoice -->
			<p><?php if(!empty($game->userChoiceDisplay)){ 
							echo $game->userChoiceDisplay;
						} ?></p>
		</div>

		<div class="table">

            <!-- display user weapon img -->
            <?php if(!empty($game->userChoiceImg)){
						echo $game->userChoiceImg;
					} else {
						echo "<img src='img/consider-player.png' alt='waiting'>";
					}
			?>

            <!-- display computer weapon img -->
            <?php if(!empty($game->computerChoiceImg) ){
						echo $game->computerChoiceImg;
					} else {
						echo "<img src='img/consider.png' alt='waiting'>";
					}
			?>

		</div>

		<!-- display computer scores -->
		<div class="computerScore">
			<p>Computer Score:<br>  
				<span class="score"> <?php if(!empty($game->computerScore)){ 
										echo $game->computerScore;
									} else { echo "0"; }?></span></p>
			
			<!-- display computer Choice -->
			<p><?php if(!empty($game->computerChoiceDisplay)){ 
						echo $game->computerChoiceDisplay;
						} ?></p>
		</div>
		

	</div>
	<div class="result">

		<!-- display the overall result -->
		<h3><?php if(!empty($game->overAllResult)){ 
					echo $game->overAllResult; 
					}?></h3>

		<!-- display result -->
		<p><?php if(!empty($game->roundResult)){ 
					echo $game->roundResult;
					} ?></p>
	</div>

	<div class="weaponList">
		<form action="index.php" method="post">
			<button name="userChoice" value="1" <?php if(!empty($game->overAllResult)){echo "disabled";}  ?>>
				<img src="img/stone.png" alt="rock"></button>
			<button name="userChoice" value="2" <?php if(!empty($game->overAllResult)){echo "disabled";}  ?>>
				<img src="img/paper.png" alt="paper"></button>
			<button name="userChoice" value="3" <?php if(!empty($game->overAllResult)){echo "disabled";}  ?>>
				<img src="img/scissors.png" alt="scissors"></button>

			<button name="restart" value="restart"
				<?php if(empty($game->overAllResult)){echo "disabled";}  ?>>RESTART</button>
		</form>
	</div>


</body>

</html>
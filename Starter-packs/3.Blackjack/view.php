<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino royale - Blackjack</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h1>Blackjack</h1>

<div class="btn-area">
    <form action="" method="post">

        <?php if (empty($_POST["userDecision"])){ // display the START button if $post is empty
            echo "<button name='userDecision' value='start'>START</button>";
        } else if (!empty($player->blackJackAnnounce)){ //change btn to RESTART when player has blackjack 
            echo "<button name='userDecision' value='start'>RESTART</button>";
        } else if (!empty($player->result)){ //change btn to RESTART when there is a result 
            echo "<button name='userDecision' value='start'>RESTART</button>";
        } else if(!empty($_POST["userDecision"]) && empty($player->result)){ // disable btn when game already started
            echo "<button name='userDecision' value='start' disabled>START</button>";
        } 
        ?>

        <button name="userDecision" value="hit"
        <?php  if(!empty($player->blackJackAnnounce)|| !empty($player->result)){
            echo "disabled"; } //set disable to HIT if result is out?>>HIT</button>

        <button name="userDecision" value="hold"
        <?php  if(!empty($player->blackJackAnnounce)|| !empty($player->result)){
            echo "disabled"; } //set disable to HOLD if result is out?>>HOLD</button>

    </form>
</div>

<!-- display compare result -->
<h4><?php if(!empty($player->result)) {?>
 <?php echo $player->result;} ?>
</h4>

<!-- display if computer/player get blackjack -->
<?php if(!empty($player->blackJackAnnounce)) {?>
<h4> <?php echo $player->blackJackAnnounce;}?></h4>

<div class="card-table">
    <!-- display player cards img -->
    <div>
        <p>Your cards: </p>
        <?php if(!empty($player->cardArray)){
        foreach ($player->cardArray as $card) {
            echo "<img src='./img/{$card}.jpg' alt='{$card}'>";
        }}?>
    </div>

    <!--display dealer cards img-->
    <div>
        <p>Dealer cards:</p> 
        <?php if (!empty($computer->cardArray) && !empty($player->result)){
           //if the result is out, display every cards
           foreach (($computer->cardArray)  as $card) {
                echo "<img src='./img/{$card}.jpg' alt='{$card}'>";
            }
        } else if(!empty($computer->cardArray)){ 
            //if the result is not there, hide the display of first card
            echo "<img src='./img/cardback.jpg' alt='cardback'>";
            //use the array_slice to take out the first value of $this->cardArray
            foreach(array_slice($computer->cardArray,1) as $card){
                echo "<img src='./img/{$card}.jpg' alt='{$card}'>";
            }  
        }?>
    </div>

    <div class="player-cards">
        <!-- display player totalValue -->
        <p><?php if(!empty($player->totalValueUser)) { ?>

            <span> Your Cards' Total Value: </span>

        <?php echo $player->totalValueUser; }?></p>
    </div>

    <!-- display computer totalValue when result come up -->
    <div class="computer-card">
        <p><?php if(!empty($player->result)) {?>

            <span>Dealer Cards' Total Value: </span>
            
        <?php echo $computer->totalValueComputer;}?>
        </p>
    </div>
    
</div>








</body>
</html>
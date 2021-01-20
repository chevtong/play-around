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

    <!-- //TODO: user blackjack -> restart btn not come up , modify display msg -->

        <?php if (empty($_POST["userDecision"])){ // display the START button if $post is empty
            echo "<button name='userDecision' value='start'>START</button>";
        } else if(!empty($_POST["userDecision"]) && empty($player->result)){ // disable btn when game already started
            echo "<button name='userDecision' value='start' disabled>START</button>";
        } else if (!empty($player->result)){ //change btn to RESTART when there is a result 
            echo "<button name='userDecision' value='start'>RESTART</button>";
        }?>

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

    <!--TODO: display computer cards img, first show the back of the card-->
    <!-- show the value of cards when the $player->result is out -->
    <div>
        <p>Dealer cards:</p> 
        <?php if (!empty($computer->cardArray) && !empty($player->result)){
            foreach ($computer->cardArray as $card) {
                echo "<img src='./img/{$card}.jpg' alt='{$card}'>";
            }
        } else if(!empty($computer->cardArray)){
            foreach ($computer->cardArray as $card) {
                echo "<img src='./img/cardback.jpg' alt='cardback'>";
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
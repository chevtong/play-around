<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino royale - Blackjack</title>

    <style>
    img{
        width: 6rem;
    }
    </style>
</head>
<body>



<form action="" method="post">

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

<!-- display if computer/player get blackjack -->
<p><?php if(!empty($player->blackJackAnnounce)) {echo $player->blackJackAnnounce;}?></p>

<!-- display player cards -->
<p><?php if(!empty($player->cardArray)) { ?>

    <span> Your Cards: </span>

    <?php foreach ($player->cardArray as $card) {echo $card . " ";}
}?></p>

<!-- display player totalValue -->
<p><?php if(!empty($player->totalValueUser)) { ?>

    <span> Your Cards' Total Value: </span>

<?php echo $player->totalValueUser; }?></p>

<!-- display compare result -->
<p><?php if(!empty($player->result)) {echo $player->result;}?></p>

<!-- display computer cards when result come up -->
<p><?php if(!empty($player->result)) { ?>

    <span> Computer Cards: </span>

<?php foreach ($computer->cardArray as $card) {echo $card . " ";}
}?></p>

<!-- display computer totalValue when result come up -->
<p><?php if(!empty($player->result)) {?>

    <span>Dealer Cards' Total Value: </span>
    
<?php echo $computer->totalValueComputer;}?>
</p>

<!-- display player cards img -->
<div>Your cards: <?php if(!empty($player->cardArray)){
    foreach ($player->cardArray as $card) {
        echo "<img src='./img/{$card}.jpg' alt='{$card}'>";
    }}?>
</div>

<!-- display computer cards img -->
<div>Dealer cards: <?php 
    if (!empty($computer->cardArray) && !empty($player->result)){
        foreach ($computer->cardArray as $card) {
            echo "<img src='./img/{$card}.jpg' alt='{$card}'>";
        }
    } else if(!empty($computer->cardArray)){
        foreach ($computer->cardArray as $card) {
            echo "<img src='./img/cardback.jpg' alt='cardback'>";
        }
    } 
    
    ?>
</div>


</body>
</html>
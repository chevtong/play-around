<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino royale - Blackjack</title>
</head>
<body>



<form action="" method="post">
<button name="userDecision" value="start">START</button>

<button name="userDecision" value="hold">HOLD</button>
<button name="userDecision" value="hit">HIT</button>

</form>

<!-- display if computer/player get blackjack -->
<p><?php if(!empty($player->blackJackAnnounce)) {echo $player->blackJackAnnounce;}?></p>
<p><?php if(!empty($computer->blackJackAnnounce)) {echo $computer->blackJackAnnounce;}?></p>

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
    
    <?php echo $computer->totalValueComputer;}
?></p>

</body>
</html>
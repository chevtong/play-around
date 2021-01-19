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

<p><?php if(!empty($player->result)) {echo $player->result;}?></p>
</body>
</html>
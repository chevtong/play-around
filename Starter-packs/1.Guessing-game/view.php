<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Casino royale - guessing game</title>
</head>

<body>

    <div class="card my-5 mx-auto mb-3 " style="width: 25rem;">
        <form action="index.php" method="post">
            <div class="card-header">
                <label for="exampleInputEmail1" class="form-label"><h3>Guess A Number (1-10)</h3> You have 3 attempts to try
                    it out!<br></label>
            </div>
            <div class="card-body">
                <input type="number" max="10" name="inputNumber" class="form-control" id="exampleInputEmail1"><br>
                <div class="d-grid gap-2 col-10 mx-auto">
                    <input type="submit" name="submit" class="btn btn-outline-warning" value="<?php  
								if(($game->attempts == 0) && !empty($_POST["submit"])){echo "RESTART"; } else {echo "SUBMIT";} 
									//to change the text of the input inside value attribute from submit to restart?>">
                </div>
            </div>
        </form>

        <div class="card-body">
			<p>Your Choice: <?php if(isset($_POST["inputNumber"])){echo $_POST["inputNumber"];}?></p>
			<p> Attempts: <?php if(!empty($game->attempts)){ echo $game->attempts;
								} else if ((isset($_POST["submit"])) && ($game->attempts == 0)){ 
									echo $game->allAttemptsUsed();} ?></p>
            <p>Result: <?php if(!empty($game->result)){ echo $game->result;} ?></p>
        </div>
    </div>

</body>

</html>
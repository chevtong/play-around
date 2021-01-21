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
                <label for="exampleInputEmail1" class="form-label">
                    <h3>Guess A Number (1-10)</h3>
                    Choose the level<label>            
                        <button name="maxGuess" value="4" class="btn btn-warning"
                            <?php if(!empty($game->maxGuess)){echo "disabled";}?>>LOW</button>
                        <button name="maxGuess" value="3" class="btn btn-warning"
                            <?php if(!empty($game->maxGuess)){echo "disabled";}?>>MED</button>
                        <button name="maxGuess" value="2" class="btn btn-warning"
                            <?php if(!empty($game->maxGuess)){echo "disabled";}?>>HIGH</button>
            </div>
            <div class="card-body">
                <input type="number" max="10" name="inputNumber" class="form-control" id="exampleInputEmail1" <?php if(empty($game->maxGuess)){
                            echo " placeholder='Please Choose the level above' disabled";
                        } else {echo " placeholder='Please enter a number' ";}?>><br>
                <div class="d-grid gap-2 col-10 mx-auto">
                    <input type="submit" name="submit" class="btn btn-outline-warning"
                        <?php if(empty($game->maxGuess)){echo "disabled";}?>>

                </div>
            </div>
        </form>

        <div class="card-body">
            <p>Your Choice: <?php if(!empty($game->numInput)){echo $game->numInput;} else {echo "-";}?></p>
            <p>Chances: <?php if(!empty($game->maxGuess)){echo $game->maxGuess;} else {echo "-";}?></p>
            <p> Attempts: <?php if(!empty($game->guess)){echo $game->guess;} else {echo "-";} ?></p>
            <p>Result: <?php if(!empty($game->result)){ echo $game->result;} else {echo "-";} ?></p>
        </div>
    </div>

</body>

</html>
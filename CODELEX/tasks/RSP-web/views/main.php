<!DOCTYPE html>

<html>
<body>
<h1>RPSSL</h1>
<br>


<form action="/" method="get" target="">
    <?PHP

    foreach ($collection->getChoiceCollection() as $item) {
        echo "
            <input type='radio' id='male' name='$item->symbol' value='$item->symbol'>
    <label for='male'>$item->symbol</label><br>
        ";
    }
    ?>

    <br><br>

    <button type="submit" formmethod="post"> PLAY</button>
</form>
<br><br>
<?PHP
$pcChoice = $game->pcChoice();
$winner = $game->getWinner();
echo " <h1>PC choice: $pcChoice</h1>" . PHP_EOL;
echo " <h1>Result: $winner</h1>"
?>


<style>

    h1 {
        font-family: arial, sans-serif;
        color: green;
    }

</style>
</body>
</html>
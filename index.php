<?php
    $maxPokeNo = 809;
    $url = "https://pokeapi.co/api/v2/pokemon?limit=$maxPokeNo";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    $result = json_decode($response, true);
    $data = $result['results'];
    $i = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>ポケモン図鑑</h1>
        </div>
        
        <div class="pokedex">
            <?php while($i < $maxPokeNo): ?>
                <?php $pokemon = $data[$i]; ?>
                <?php $name = $pokemon['name']; ?>
                <div class="content">
                    <?php if($i < 100): ?>
                        <?php printf('%03d<br>%s', $i, $name); ?><br>
                        <?php $i++; ?>
                        <a href="show.php?name='<?php echo $name ?>'"><img src="thumbnails/<?php printf('%03d',$i) ?>.png" alt="<?php echo $name ?>の画像"></a><br>
                    <?php elseif($i < 10): ?>
                        <?php printf('%03d<br>%s', $i, $name); ?><br>
                        <?php $i++; ?>
                        <a href="show.php?name='<?php echo $name ?>'"><img src="thumbnails/<?php printf('%02d',$i) ?>.png" alt="<?php echo $name ?>の画像"></a><br>
                    <?php else: ?>
                        <?php printf('%03d<br>%s', $i, $name); ?><br>
                        <?php $i++; ?>
                        <a href="show.php?name='<?php echo $name ?>'"><img src="thumbnails/<?php printf('%d',$i) ?>.png" alt="<?php echo $name ?>の画像"></a><br>
                    <?php endif ?>
                </div>
            <?php endwhile ?>
        </div>
        
    </div>

</body>
</html>
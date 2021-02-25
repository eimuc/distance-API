<?php require('./api.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distance calculator</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <h1>World cities distance calculator</h1>
        <form action="" method="post">
            <label for="city1">Your location:</label>
            <input type="text" name="city1" placeholder="Enter city name" value="<?= $city1 ?? '' ?>">
            <label for="city2">Going to:</label>
            <input type="text" name="city2" placeholder="Enter city name" value="<?= $city2 ?? '' ?>">
            <button type="submit">GET DISTANCE</button>
        </form>

    <?php if(isset($distance)): ?>
    <?php if(!$distance == 0): ?>
    <div class="answer">
        <p>Distance is: <strong><b><?= $distance ?? '' ?></b></strong> KM</p>
        <p>Some <strong><b><?= $city2 ?? '' ?></b></strong>  photos: </p>
        <!-- <img src="<?= $image1 ?? '' ?>"> -->
        <img src="<?= $image2 ?? '' ?>">
    </div>
    <?php else: ?>
    <div class="answer">
        <p>Wrong or the same city names!</p>
    </div>
    <?php endif ?>
    <?php endif ?>
</div>
</body>
</html>
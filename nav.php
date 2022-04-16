<?php
$navItems = array(
    (array) [
        'label' => 'Hire & Work',
        'href' => '#'
    ],
    (array) [
        'label' => 'NFT Market',
        'href' => '#'
    ],
    (array) [
        'label' => 'Charity',
        'href' => '#'
    ],
    (array) [
        'label' => 'Documents',
        'href' => '#'
    ],
    (array) [
        'label' => 'Audit',
        'href' => '#'
    ],
    (array) [
        'label' => 'News',
        'href' => 'news'
    ],
    (array) [
        'label' => 'Ecosystem',
        'href' => '#'
    ],
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="fixed nav-container">
        <button id="toggle">☰</button>
        <nav class="navigation">
            <span id="nav-close">x</span>
            <a href="#" class="logo"><img src="images/logo.png" alt="Farmme Logo" width="90"></a>
            <?php
            foreach ($navItems as $item) {
                echo ('<a class="nav-item" href="' . $item['href'] . '">' . $item['label'] . '</a>');
            }
            ?>
            <a class="play-game" href="#"><img src="images/play-game.png" alt="Play game" width="120"></a>
        </nav>
    </div>
</body>

</html>
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
        'href' => '#',
        'subs' => [
            [
                'label' => 'Token metrics',
                'href' => '#'
            ],
            [
                'label' => 'Pitch deck',
                'href' => '#'
            ],
            [
                'label' => 'White paper',
                'href' => '#'
            ],
            [
                'label' => 'Getting started',
                'href' => '#'
            ],
            [
                'label' => 'Audit',
                'href' => '#'
            ],
        ]
    ],
    (array) [
        'label' => 'Audit',
        'href' => '#'
    ],
    (array) [
        'label' => 'News',
        'href' => '#'
    ],
    (array) [
        'label' => 'Ecosystem',
        'href' => '#'
    ],
);

?>

<style>
@font-face {
    font-family: "ARCO";
    src: url("fonts/ARCO.ttf");
}

:root {
    --nav-sub-bg: #f5dcc0;
    --brown: #794821;
    --aqua: #85ede4;
    --orange: #efab17;
}

.fixed {
    position: fixed;
    z-index: 9998;
}

#toggle {
    right: 20px;
    top: 20px;
    font-size: 15px;
    font-family: "ARCO";
    background-color: var(--brown);
    color: #fff;
    border: none;
    border-radius: 5px;
    height: 36px;
    width: 36px;
    display: none;
    justify-content: center;
    align-items: center;
}

.nav-container {
    width: 100%;
    top: 0;
}

.navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    align-content: center;
    margin: 0 85px;
    background-color: var(--brown);
    border-radius: 0 0 20px 20px;
    box-shadow: 0px 7px 0px #4f2c15;
}

.navigation .logo {
    margin: 0 0 -60px 70px;
}

.navigation .play-game {
    margin: 0 70px -60px 0;
}

.navigation>ul {
    display: flex;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    flex-grow: 1;
    justify-content: space-between;
}

.nav-sub {
    list-style-type: none;
    margin: 0;
    padding: 0;
    position: absolute;
    background-color: var(--nav-sub-bg);
    top: 100%;
    box-shadow: 0px 7px 0px #b38963;
    border-radius: 0 0 20px 20px;
    display: none;
}

.nav-sub li a {
    display: block;
    padding: 7px 30px;
    color: var(--brown) !important;
}

.nav-sub li:last-child a {
    border-radius: 0 0 20px 20px;
}

.nav-sub li a:hover {
    color: var(--nav-sub-bg) !important;
    background-color: var(--brown);
    transition: all 0.3s;
}

.navigation>ul>li {
    float: left;
    padding: 15px 10px;
}

.navigation .nav-item a {
    text-decoration: none;
    color: #fff;
    font-size: 14px;
    text-transform: uppercase;
    font-family: "ARCO";
    display: block;
}

.navigation .nav-item>a:hover {
    color: #49ad97;
    transition: all 0.3s;
}

.navigation .nav-item:hover .nav-sub {
    display: block;
}

.nav-collapse {
    color: #fff;
    display: none;
    font-family: "ARCO";
    padding: 0 20px;
    border-left: 1px solid var(--nav-sub-bg);
}

@media screen and (max-width: 640px) {
    #toggle {
        display: flex;
    }

    .nav-container {
        left: 100vh;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .navigation {
        height: 80%;
        width: 80%;
        flex-direction: column;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 20px 0 0 20px;
        box-shadow: -7px 2px 0 0 #4f2c15 !important;
    }

    .navigation>ul {
        flex-direction: column;
        width: inherit;
        justify-content: flex-start;
    }

    .navigation .nav-item {
        float: unset;
        position: relative;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .navigation .logo {
        margin: -60px 0 0 0;
    }

    .navigation .play-game {
        margin: 0 0 -40px 0;
    }

    .navigation .nav-sub {
        position: relative;
        top: 10px;
        border: unset;
        box-shadow: none;
        border-radius: 10px;
    }

    .nav-sub::before {
        content: "";
        width: 20px;
        height: 20px;
        background-color: #fff;
    }

    .nav-sub li a {
        color: #fff !important;
    }

    .nav-item a span {
        position: absolute;
        right: 0;
    }

    #nav-close {
        font-size: 30px;
        position: absolute;
        right: 15px;
        top: -15px;
        color: #fff;
        width: 36px;
        height: 36px;
        background-color: var(--brown);
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        box-shadow: -3px 3px 0 0 #4f2c15 !important;
    }

    .nav-sub li:last-child a {
        border-radius: 0 0 10px 10px;
    }

    .nav-collapse {
        display: block;
    }
}
</style>

<div class="fixed" id="toggle">☰</div>
<div class="fixed nav-container">
    <nav class="navigation">
        <div id="nav-close">x</div>
        <a href="#" class="logo"><img src="images/logo.png" alt="Farmme Logo" width="90"></a>
        <ul>
            <?php
            foreach ($navItems as $item) {
                $cls = isset($item['subs']) ? '<span class="nav-collapse">▼</span>' : '';
                echo ('<li class="nav-item">');
                echo ('<a href="' . $item['href'] . '">' . $item['label'] . '</a>');
                echo $cls;
                if (isset($item['subs'])) {
                    echo ('<ul class="nav-sub">');
                    foreach ($item['subs'] as $sub) {
                        echo ('<li><a href="' . $sub['href'] . '">' . $sub['label'] . '</a></li>');
                    }
                    echo ('</ul>');
                }
                echo ('</li>');
            }
            ?>
        </ul>
        <a class="play-game" href="#"><img src="images/play-game.png" alt="Play game" width="120"></a>
    </nav>
</div>

<script>

</script>
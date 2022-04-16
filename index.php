<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.7/swiper-bundle.css"
        integrity="sha512-g0BdMh4zEp4DuzHdoenUitpFx195QZfSFq5sd04kXZLwz5F9pUlGqwk+1jlvBBFGOnTCt0b5FsmQyl+5v2fxWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Farmme</title>
</head>

<body>
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
    $tokens = array(
        ['type' => 'ERC 20', 'token' => '0x818f49467021BDaadAE69E071E79AD2fD7226a1E'],
        ['type' => 'AURORA', 'token' => '0xd5c997724e4b5756d08e6464c01afbc5f6397236'],
    );

    $slides = array(
        ['src' => 'images/ido.png', 'alt' => 'Slider 0'],
        ['src' => 'images/ido-1.png', 'alt' => 'Slider 1'],
        ['src' => 'images/ido-2.png', 'alt' => 'Slider 2']
    )

    ?>
    <div class="fixed b-12 nav-container">
        <button id="toggle">☰</button>
        <nav class="b-10 navigation">
            <span id="nav-close">x</span>
            <a href="#" class="logo"><img src="images/logo.png" alt="Farmme Logo" width="90"></a>
            <?php
            foreach ($navItems as $item) {
                echo ('<a class="nav-item" href="' . $item['href'] . '">' . $item['label'] . '</a>');
            }
            ?>
            <a class="download-game" href="bitfield"><img src="images/download-game.png" alt="Download game"
                    width="120"></a>
        </nav>
    </div>

    <div class="b-12 main-content">
        <img class="banner" src="images/background.png" alt="Banner">
        <div class="b-12 content">
            <div class="description">
                <img src="images/description.png" alt="">
            </div>
            <div class="timing">
                <div class="timing-left b-6">
                    <img src="images/main-title.png" alt="LISTING DEX ON DODO">
                    <img class="detail" src="images/listing-time.png" alt="Listing time">
                </div>
                <div class="timing-right b-6">
                    <img src="images/btn-how-to-join.png" alt="How to join">
                    <img src="images/btn-join-now.png" alt="Join now">
                </div>
            </div>
            <div class="tour-btns">
                <img src="images/btn-getting-started.png" alt="Getting started">
                <img src="images/btn-white-paper.png" alt="White paper">
            </div>
            <div class="token-contract">
                <img src="images/title-contract.png" alt="FAME Token Contract">
                <?php foreach ($tokens as $token) { ?>
                <div class="token-box b-12">
                    <span class="token-type"><?php echo $token['type'] ?></span>
                    <span class="token"><?php echo $token['token'] ?></span>
                    <img class="copy-token" src="images/ic-copy.png" alt="Copy token" width="20">
                    <span class="copied">Copied!</span>
                </div>
                <?php } ?>
            </div>
            <div class="b-row b-12 table-container">
                <div class="b-5 b-row slider frame">
                    <div class="b-1 swiper-direction"><img class="swiper-prev" src="images/left-triangle-button.png"
                            alt="Previous">
                    </div>
                    <!-- Slider main container -->
                    <div class="b-10 slide-frame">
                        <img class="slider-border" src="images/box-border.png" alt="Slide border">
                        <!-- Additional required wrapper -->
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <?php foreach ($slides as $slide) { ?>
                                <div class="swiper-slide"><img src="<?php echo $slide['src'] ?>"
                                        alt="<?php echo $slide['alt'] ?>"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="b-1 swiper-direction flex-end"><img class="swiper-next"
                            src="images/right-triangle-button.png" alt="Next">
                    </div>
                </div>
                <div class="b-7 news-frame frame">
                    <!-- <img class="border border--top" src="images/bottom-border.png" alt="News border"> -->
                    <div class="b-12 tab-container">
                        <div class="b-row labels">
                            <span class="b-4 tab-label active">News</span>
                            <span class="b-4 tab-label">Event</span>
                            <span class="b-4 tab-label">Community</span>
                        </div>
                        <div class="b-row contents">
                            <div class="b-12 tab-content active">
                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                <div class="news-item b-row">
                                    <span class="b-10 news__content">Lorem, ipsum dolor sit amet consectetur adipisicing
                                        elit.</span>
                                    <span class="b-2 news__time flex-end">03:07</span>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="b-12 tab-content">EVENT</div>
                            <div class="b-12 tab-content">COMMUNITY</div>
                        </div>
                    </div>
                    <!-- <img class="border border--bottom" src="images/bottom-border.png" alt="News border"> -->
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.7/swiper-bundle.min.js"
    integrity="sha512-WlN87oHzYKO5YOmINf1+pSkbt4gm+lOro4fiSTCjII4ykJe/ycHKIaa9b2l9OMkbqEA4NxwTXAGFjSXgqEh19w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="index.js"></script>

</html>
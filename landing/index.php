<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!-- Demo styles -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $slide = [
        'src' => "images/farm-me-breeding-1.png",
        'title' => "SEIZE YOUR FARM FAME",
        'label' => 'LABEL',
        'caption' => "Mùa thu mang giấc mơ quay về vẫn nguyên vẹn như hôm nà, bay the",
    ];
    $slides = [$slide, $slide, $slide, $slide, $slide, $slide];
    ?>
    <!-- Swiper -->
    <div class="slideshow">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
            class="swiper mySwiper2 main-slide">
            <div class="swiper-wrapper">
                <?php
                foreach ($slides as $slide) {
                ?>
                <div class="swiper-slide">
                    <img src="<?php echo $slide['src'] ?>" />
                    <div class="caption">
                        <h3><?php echo $slide['title'] ?></h3>
                        <p><?php echo $slide['caption'] ?></p>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="slide-list">
            <div class="swiper-ctrl swiper-prev"><img src="images/arrow-top.png" alt=""></div>
            <div thumbsSlider="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($slides as $slide) {
                    ?>
                    <div class="swiper-slide">
                        <div class="child">
                            <img src="<?php echo $slide['src'] ?>" />
                            <span><?php echo $slide['label'] ?></span>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="swiper-ctrl swiper-next"><img src="images/arrow-top.png" alt=""></div>
        </div>

    </div>


    <!-- Swiper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <!-- Initialize Swiper -->
</body>

</html>
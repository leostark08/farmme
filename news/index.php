<?php
$post = [
    'image' => 'images/mask-group.png',
    'title' => 'IMPORTANT UPDATE: THỜI ĐẠI TÂN THỦ',
    'author' => 'FARM ME',
    'content' => 'Tân thủ được định nghĩa là những gamer mới tham gia, khi tài khoản có Level 1 và EXP = 0.
                Những thế hệ anh hùng kế tiếp của FarmMe. Các chế độ cho Tân Thủ sẽ được giữ ổn định, liên tục bổ sung
                cập nhật để gamer dễ làm quen với FARMME hơn.',
    'created_at' => 'Apr 14, 2022'
];

$filterPosts = [$post, $post, $post];

$categories = [
    [
        'image' => 'images/cg_recaps.png',
        'title' => 'AMA Recaps',
        'description' => 'Tổng hợp tất cả thông tin chính tại các AMA vừa qua, bao gồm nội dung về cập nhật tính năng, chính sách, lộ trình và kế hoạch sắp tới được chia sẻ bởi Farm Me team.'
    ],
    [
        'image' => 'images/cg_news-updates.png',
        'title' => 'News Updates',
        'description' => 'Nắm nhanh những thông tin cập nhập mới nhất trong Thế giới Farm Me, thông báo quan trọng về các tính năng game và những thay đổi sắp tới ảnh hưởng trực tiếp tới người chơi.'
    ],
    [
        'image' => 'images/cg_solo-rankings.png',
        'title' => 'Solo Rankings',
        'description' => 'Chi tiết các cuộc đua, thời gian bắt đầu, kết thúc, quy định,...những sự điều chỉnh từ Farm Me team trong suốt quá trình tổ chức tuần đua.'
    ],
    [
        'image' => 'images/cg_handbook.png',
        'title' => 'Farm Me Handbook',
        'description' => 'Sổ tay Farm Me - nắm tất cả các mẹo hay, những thông tin bổ ích để khám phá Farm Me hiệu quả nhất.'
    ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>News</title>
</head>

<body>
    <!-- HEADER -->
    <?php include('nav.php'); ?>

    <div class="container">
        <div class="head l-12 justify-space-between align-start">
            <div class="head__title">
                <span>Farm Me <string>News</string></span>
                <div class="lang-switch align-center">
                    <a href="#">ENG</a> &nbsp;|&nbsp;<a href="#">VIET</a>
                </div>
            </div>
            <div class="head__search l-4">
                <div class="search-box">
                    <input type="text" id="search" placeholder="Search everything about Farm Me here">
                </div>
            </div>
        </div>
    </div>
    <!-- POST -->
    <div class="post post--main container row">
        <img class="post__img" src="<?php echo $post['image'] ?>" alt="">
        <div class="post__info column justify-space-between">
            <span class="author">Post by: <?php echo $post['author'] ?></span>
            <span class="title"><?php echo $post['title'] ?></span>
            <p class="content"><?php echo $post['content'] ?></p>
            <div class="subs justify-space-between align-end">
                <div class="row">
                    <a href="detail.php">
                        <div class="btn-see-more align-center">Xem tiếp</div>
                    </a>
                    <a href="#">
                        <div class="btn-play"></div>
                    </a>
                </div>
                <span class="create-time"><?php echo $post['created_at'] ?></span>
            </div>
        </div>
    </div>

    <!-- STATISTICS -->
    <div class="statistic container">
        <div class="item column align-center">
            <div class="amount">21</div>
            <div class="label">Social platform</div>
        </div>
        <div class="item column align-center">
            <div class="amount">$39<span class="unit unit--long">million</span><span class="unit unit--short">M</span>
            </div>
            <div class="label">INO & Fundraising</div>
        </div>
        <div class="item column align-center">
            <div class="amount">7<span class="unit">k</span></div>
            <div class="label">NFT Boxes</div>
        </div>
        <div class="item column align-center">
            <div class="amount">6.8<span class="unit">k</span></div>
            <div class="label">Player in the first week</div>
        </div>
    </div>

    <!-- CATEGORIES -->

    <div class="categories container">
        <?php foreach ($categories as $category) { ?>
        <div class="category column">
            <img class="category__img" src="<?php echo $category['image'] ?>" alt="<?php echo $category['title'] ?>">
            <div class="category__title"><?php echo $category['title'] ?></div>
            <div class="category__description"><?php echo $category['description'] ?></div>
        </div>
        <?php } ?>
    </div>

    <!-- FILTER POSTS -->
    <div class="container colum filter-posts">
        <!-- Filter buttons -->
        <div class="filter-buttons justify-center">
            <div class="btn-filter active">General</div>
            <div class="btn-filter">AMA Recaps</div>
            <div class="btn-filter">News Updates</div>
            <div class="btn-filter">Solo Rankings</div>
            <div class="btn-filter">Handbook</div>
        </div>

        <!-- list posts -->
        <?php foreach ($filterPosts as $p) { ?>
        <div class="box">
            <div class="title-mobile">
                <span class="author">Post by: <?php echo $p['author'] ?></span>
                <span class="title"><?php echo $p['title'] ?></span>
            </div>
            <div class="post row">
                <img class="post__img" src="<?php echo $p['image'] ?>" alt="">
                <div class="post__info column justify-space-between">
                    <div class="title-desktop">
                        <span class="author">Post by: <?php echo $p['author'] ?></span>
                        <span class="title"><?php echo $p['title'] ?></span>
                    </div>

                    <p class="content"><?php echo $p['content'] ?></p>

                    <!-- subs in mobile screen -->
                    <div class="subs subs--desktop justify-space-between align-end">
                        <div class="row">
                            <a href="detail.php">
                                <div class="btn-see-more align-center">Xem tiếp</div>
                            </a>
                            <a href="#">
                                <div class="btn-play"></div>
                            </a>
                        </div>
                        <span class="create-time"><?php echo $p['created_at'] ?></span>
                    </div>
                </div>
            </div>
            <!-- subs in mobile screen -->
            <div class="subs subs--mobile justify-space-between align-end">
                <div class="row">
                    <a href="detail.php">
                        <div class="btn-see-more align-center">Xem tiếp</div>
                    </a>
                    <a href="#">
                        <div class="btn-play"></div>
                    </a>
                </div>
                <span class="create-time"><?php echo $p['created_at'] ?></span>
            </div>
        </div>
        <?php } ?>

        <div class="pagination">
            <span>Page <input type="text" name="current-page" id="" value="1"> of 200 </span>
            <div class="pag-ctrl pag-prev"></div>
            <div class="pag-ctrl pag-next enabled"></div>
        </div>
    </div>

    <div class="mention-container container">
        <div class="title">
            Media Mentions
        </div>
        <div class="mention">
            <div class="swiper-ctrl swiper-prev"></div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="logos">
                            <div class="row">
                                <a href="#"><img src="images/logo-yahoofinance.png" alt=""></a>
                                <a href="#"><img src="images/logo-finanzen.png" alt=""></a>
                                <a href="#"><img src="images/logo-morningstar.png" alt=""></a>
                            </div>
                            <div class="row">
                                <a href="#"><img src="images/logo-pinoytechsaga.png" alt=""></a>
                                <a href="#"><img src="images/logo-businessdiaryph.png" alt=""></a>
                                <a href="#"><img src="images/logo-techsignin.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logos">
                            <div class="row">
                                <a href="#"><img src="images/logo-brandinginasia.png" alt=""></a>
                                <a href="#"><img src="images/logo-ASEAN.png" alt=""></a>
                                <a href="#"><img src="images/logo-TMCnet.png" alt=""></a>
                            </div>
                            <div class="row">
                                <a href="#"><img src="images/logo-VBC.png" alt=""></a>
                                <a href="#"><img src="images/logo-aap.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-ctrl swiper-next"></div>
        </div>
    </div>

    <div class="container contact">
        <div class="title">
            <span>Small talk with</br>FARM ME <img src="images/ic-ribbon.png" alt=""></span>
        </div>
        <div class="content">
            <span>
                Have you enjoyed experiencing and exploring the Farm Me Metarverse universe? Give us feedback then get
                some small gifts from Farm Me ^^ <a href="#"><img src="images/share-your-thinking.png" alt=""></a>
            </span>
        </div>
    </div>

</body>

<?php include('footer.php'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="swiper-bundle.min.js"></script>
<script src="script.js"></script>

</html>
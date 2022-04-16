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

$filterPosts = [$post, $post];

$categories = [
    [
        'image' => 'images/category1.png',
        'title' => 'AMA Recaps',
        'description' => 'Tổng hợp tất cả thông tin chính tại các AMA vừa qua, bao gồm nội dung về cập nhật tính năng, chính sách, lộ trình và kế hoạch sắp tới được chia sẻ bởi Farm Me team.'
    ],
    [
        'image' => 'images/category1.png',
        'title' => 'News Updates',
        'description' => 'Nắm nhanh những thông tin cập nhập mới nhất trong Thế giới Farm Me, thông báo quan trọng về các tính năng game và những thay đổi sắp tới ảnh hưởng trực tiếp tới người chơi.'
    ],
    [
        'image' => 'images/category1.png',
        'title' => 'Solo Rankings',
        'description' => 'Chi tiết các cuộc đua, thời gian bắt đầu, kết thúc, quy định,...những sự điều chỉnh từ Farm Me team trong suốt quá trình tổ chức tuần đua.'
    ],
    [
        'image' => 'images/category1.png',
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
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>News</title>
</head>

<body>
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
    <div class="post container row">
        <img class="post__img" src="<?php echo $post['image'] ?>" alt="">
        <div class="post__info column justify-space-between">
            <span class="author">Post by: <?php echo $post['author'] ?></span>
            <span class="title"><?php echo $post['title'] ?></span>
            <p class="content"><?php echo $post['content'] ?></p>
            <div class="subs justify-space-between">
                <div class="row">
                    <button class="btn-see-more">
                        Xem tiếp
                    </button>
                    <button class="btn-play">
                        <img src="images/polygon.png" alt="Play">
                    </button>
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
            <div class="amount">$39<span class="unit">million</span></div>
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
    <div class="colum filter-posts">
        <!-- Filter buttons -->
        <div class="filter-buttons justify-center">
            <button class="active">General</button>
            <button>AMA Recaps</button>
            <button>News Updates</button>
            <button>Solo Rankings</button>
            <button>Handbook</button>
        </div>

        <!-- list posts -->
        <?php foreach ($filterPosts as $p) { ?>
        <div class="post container row">
            <img class="post__img" src="<?php echo $p['image'] ?>" alt="">
            <div class="post__info column justify-space-between">
                <span class="author">Post by: <?php echo $p['author'] ?></span>
                <span class="title"><?php echo $p['title'] ?></span>
                <p class="content"><?php echo $p['content'] ?></p>
                <div class="subs justify-space-between">
                    <div class="row">
                        <button class="btn-see-more">
                            Xem tiếp
                        </button>
                        <button class="btn-play">
                            <img src="images/polygon.png" alt="Play">
                        </button>
                    </div>
                    <span class="create-time"><?php echo $p['created_at'] ?></span>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>

</html>
<?php

$post = [
    'image' => 'images/mask-group.png',
    'title' => 'IMPORTANT UPDATE: THỜI ĐẠI TÂN THỦ',
    'author' => 'FARM ME',
    'content' => 'Tân thủ được định nghĩa là những gamer mới tham gia, khi tài khoản có Level 1 và EXP = 0.
                Những thế hệ anh hùng kế tiếp của FarmMe. Các chế độ cho Tân Thủ sẽ được giữ ổn định, liên tục bổ sung
                cập nhật để gamer dễ làm quen với FARMME hơn.',
    'created_at' => 'Apr 14, 2022',
    'detail' => '
    <p><span style="font-size:24px"><strong>1. M&Oacute;N QU&Agrave; T&Acirc;N THỦ</strong></span></p>

                <p><span style="font-size:20px">Lời ch&agrave;o đầu v&agrave; cũng l&agrave; m&oacute;n qu&agrave; cho
                        t&acirc;n thủ sẽ bao gồm:</span></p>

                <ul>
                    <li><span style="font-size:20px">L&Igrave; X&Igrave;: thời điểm tại lần login đầu ti&ecirc;n
                            th&igrave; sẽ nhận được 1 l&igrave; x&igrave; (mở ngẫu nhi&ecirc;n sẽ nhận từ 100-350 $ME để
                            bắt đầu l&agrave;m kinh tế). 10 $ME ban đầu vẫn giữ.</span></li>
                    <li><span style="font-size:20px">Khi dưới Level 5 th&igrave; hầu hết c&aacute;c Daily quest sẽ chỉ
                            bao gồm quest ở mức Easy v&agrave; Medium để t&acirc;n thủ l&agrave;m quen dần v&agrave; dễ
                            ph&aacute;t triển.</span></li>
                </ul>

                <p><span style="font-size:24px"><strong>2. TĂNG TH&Ecirc;M LƯỢNG TICKET KHI L&Agrave;M
                            QUEST</strong></span></p>

                <p><span style="font-size:20px">Trước đ&acirc;y phải ho&agrave;n th&agrave;nh đủ 9 quest mới nhận được 1
                        ticket.</span></p>

                <p><span style="font-size:20px">C&ograve;n với cơ chế mới th&igrave; sau khi ho&agrave;n th&agrave;nh
                        mỗi mốc 3-6-9 nhiệm vụ th&igrave; sẽ nhận được 1 ticket.</span></p>

                <p><span style="font-size:20px">Tức l&agrave; tối đa 3 ticket trong ng&agrave;y (&aacute;p dụng cho tất
                        cả c&aacute;c gamer to&agrave;n FARMME chứ kh&ocirc;ng ri&ecirc;ng t&acirc;n thủ).</span></p>

                <p><span style="font-size:24px"><strong>3. TẠO RA T&Iacute;NH THANH KHOẢN CHO TICKET</strong></span></p>

                <p><span style="font-size:20px">Trước đ&acirc;y c&aacute;c ticket chỉ c&oacute; thể d&ugrave;ng quay số
                        th&igrave; nay c&oacute; thể c&oacute; t&iacute;nh thanh khoản như 1 loại tiền tệ. Bạn c&oacute;
                        thể b&aacute;n trực tiếp ticket ra FAME (FAME sẽ được nhận v&agrave;o trong My Balance).
                        &Aacute;p dụng cho cả c&aacute;c ticket trước đ&oacute; m&agrave; Gamer vẫn chưa sử dụng.</span>
                </p>

                <p><span style="font-size:20px">Gi&aacute; của ticket sẽ c&oacute; thể điều chỉnh nhưng kh&ocirc;ng
                        thường xuy&ecirc;n v&agrave; ch&ecirc;nh lệch sẽ được giữ b&igrave;nh ổn. Đ&acirc;y c&oacute;
                        thể sẽ l&agrave; 1 nguồn thu tốt cho gamer khi kh&ocirc;ng mặn m&agrave; hoặc yếu thế khi tham
                        gia đua top, việc t&iacute;nh tỉ lệ ho&agrave;n vốn cũng sẽ dễ x&aacute;c định hơn. Tuy
                        nhi&ecirc;n FARMME vẫn khuyến kh&iacute;ch c&aacute;c bạn tham gia đua v&igrave; đ&oacute;
                        l&agrave; 1 trải nghiệm th&uacute; vị.</span></p>

                <p><span style="font-size:24px"><strong>4. V&Ograve;NG QUAY MAY MẮN BỔ SUNG GIẢI THƯỞNG</strong></span>
                </p>

                <p><span style="font-size:20px">V&ograve;ng quay may mắn sẽ c&oacute; 3 &ocirc; nhận được tiền (bằng
                        $FAME), c&ograve;n 5 &ocirc; c&ograve;n lại ra vật phẩm, gamer sẽ claim v&agrave; nhận được
                        trong game, gi&uacute;p cho tăng nhanh level v&agrave; chỉ số.</span></p>

    '
];

$recommend = [
    'image' => 'images/recommend0.png',
    'title' => 'IMPORTANT UPDATE: THỜI ĐẠI TÂN THỦ',
    'content' => 'Tổng hợp tất cả thông tin chính tại các AMA vừa qua, bao gồm nội dung về cập nhật tính năng, chính sách, lộ trình và kế hoạch sắp tới được chia sẻ bởi Farm Me team.',
    'created_at' => '14 April, 2202'
];

$recommends = [$recommend, $recommend, $recommend];

function getShortName($name)
{
    $nameElement = explode(' ', $name);
    $shortName = implode('', [str_split($nameElement[0], 1)[0], str_split($nameElement[sizeof($nameElement) - 1], 1)[0]]);
    return strtoupper($shortName);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Detail</title>
</head>

<body>
    <?php include('nav.php'); ?>
    <!-- HEAD -->
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
    <div class="post-container container">
        <div class="post-info column">
            <div class="author row">
                <div class="justify-start align-center">
                    <div class="avatar"><?php echo getShortName($post['author']); ?></div>
                    <div class="info">
                        <span class="name"><?php echo $post['author'] ?></span>
                        <p class="created-time"><?php echo $post['created_at'] ?></p>
                    </div>
                </div>
                <div class="buttons buttons--mobile">
                    <div class="favorite"></div>
                    <div class="share"></div>
                </div>
            </div>
            <span class="title"><?php echo $post['title'] ?></span>
            <span class="content"><?php echo $post['content'] ?></span>

            <div class="buttons buttons--desktop">
                <div class="favorite"></div>
                <div class="share"></div>
            </div>
        </div>

        <div class="post-detail">
            <img src="<?php echo $post['image'] ?>" alt="">
            <div class="detail">
                <!-- render from data create by HTML Editor -->
                <?php echo $post['detail'] ?>
            </div>
        </div>
    </div>

    <!-- RECOMMEND CONTAINER -->
    <div class="recommend-container container">
        <span class="lb-title">Có thể bạn quan tâm</span>
        <div class="recommends justify-space-between">
            <?php foreach ($recommends as $rec) { ?>
            <div class="item">
                <img src="<?php echo $rec['image'] ?>" alt="<?php echo $rec['title'] ?>">
                <div class="item__content">
                    <span class="title"><?php echo $rec['title'] ?></span>
                    <span class="content"><?php echo $rec['content'] ?></span>

                    <div class="subs justify-space-between align-end">
                        <div class="row">
                            <a href="detail.php">
                                <div class="btn-see-more align-center">Xem tiếp</div>
                            </a>
                            <a href="#">
                                <div class="btn-play"></div>
                            </a>
                        </div>
                        <span class="create-time"><?php echo $rec['created_at'] ?></span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
<?php include('footer.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>

</html>
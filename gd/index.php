<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GD</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="flex">
        <div class="frame-container">
            <img id="frame" src="images/frame.png" alt="">
            <div class="images" id="image1">
                <div class="zoom_outer">
                    <div class="zoom">
                        <img src="https://picsum.photos/1280/720" alt="zoom">
                    </div>
                </div>
            </div>
            <div class="images" id="image2">
                <div class="zoom_outer">
                    <div class="zoom">
                        <img src="https://picsum.photos/1280/720" alt="zoom">
                    </div>
                </div>
            </div>
        </div>
        <form id="formImg1" action="generate-image.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input id="pickImg1" type="file" name="fileupload" id="fileupload" data-image="image1">
                <input id="uploadImg1" type="submit" value="Upload Image 1" name="submit">
                <input type="hidden" name="image1">
                <input type="hidden" class="imageUrl" name="imageUrl1">
            </div>
            <div class="form-group">
                <input id="pickImg2" type="file" name="fileupload" id="fileupload" data-image="image2">
                <input id="uploadImg2" type="submit" value="Upload Image 2" name="submit">
                <input type="hidden" name="image2">
                <input type="hidden" class="imageUrl" name="imageUrl2">
            </div>
            <input type="submit" value="Download Image" id="download-image">
        </form>

    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>

</html>
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
                <!-- <img src="images/category1.png" alt=""> -->
            </div>
        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input id="pickImg1" type="file" name="fileToUpload" id="fileToUpload">
            <input id="uploadImg1" type="submit" value="Upload Image" name="submit">
        </form>

    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>

</html>
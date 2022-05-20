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
            <div class="child-image" id="image-1">
                <img class="zoom" src="" alt="zoom">
            </div>
            <div class="child-image" id="image-2">
                <img class="zoom" src="" alt="zoom">
            </div>
        </div>
        <div class="buttons">
            <button class="btn-upload upload-1" data-picker="pick-1">UPLOAD IMAGE 1</button>
            <input type="file" name="pick-1" id="pick-1" data-target="image-1">
            <button class="btn-upload upload-2" data-picker="pick-2">UPLOAD IMAGE 2</button>
            <input type="file" name="pick-2" id="pick-2" data-target="image-2">
            <button class="btn-download">DOWNLOAD IMAGE</button>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>

</html>
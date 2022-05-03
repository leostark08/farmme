$(document).ready(function () {
    const frame = $('#frame');
    const frame_size = { 'width': 700, 'height': 700 };
    const frameImage1 = calcMoreInfoImage({ 'x': 93, 'y': 169 }, { 'x': 426, 'y': 131 }, { 'x': 116, 'y': 375 }, { 'x': 451, 'y': 337 });

    const image1 = $('#image1');

    var image1Ratio = { 'width': frame.width() / frame_size.width, 'height': frame.height() / frame_size.height }

    image1.css({ 'left': frameImage1.centerX * image1Ratio.width + 'px', 'top': frameImage1.centerY * image1Ratio.height + 'px', 'width': frameImage1.width * image1Ratio.width, 'height': frameImage1.height * image1Ratio.height, 'transform': ' translateX(-50%) translateY(-50%) rotate(-' + frameImage1.rotate + 'deg)' });

    $('#uploadImg1').click(function (e) {
        e.preventDefault();
        const pickImg1 = $('#pickImg1');
        pickImg1.trigger('click');
        pickImg1.change(function () {
            var checkImg = checkImage(pickImg1.prop('files')[0]);
            if (!checkImg.success) {
                alert(checkImg.message);
                return;
            }
            var formImg1Data = new FormData();
            formImg1Data.append('file', pickImg1.prop('files')[0])
            $.ajax({
                method: 'POST',
                url: 'upload.php',
                contentType: false,
                processData: false,
                dataType: 'text',
                data: formImg1Data,
                success: function (data) {
                    $('#zoom img').attr('src', data);
                },
                error: function () {

                }
            })
        });
    });



    var scale = 1,
        panning = false,
        pointX = 0,
        pointY = 0,
        start = { x: 0, y: 0 },
        zoom = document.getElementById("zoom");
    function setTransform() {
        zoom.style.transform = "translate(" + pointX + "px, " + pointY + "px) scale(" + scale + ")";
    }
    zoom.onmousedown = function (e) {
        e.preventDefault();
        start = { x: e.clientX - pointX, y: e.clientY - pointY };
        panning = true;
    }
    zoom.onmouseup = function (e) {
        panning = false;
    }
    zoom.onmousemove = function (e) {
        e.preventDefault();
        if (!panning) {
            return;
        }
        pointX = (e.clientX - start.x);
        pointY = (e.clientY - start.y);
        setTransform();
    }
    zoom.onwheel = function (e) {
        e.preventDefault();
        var xs = (e.clientX - pointX) / scale,
            ys = (e.clientY - pointY) / scale,
            delta = (e.wheelDelta ? e.wheelDelta : -e.deltaY);
        (delta > 0) ? (scale *= 1.2) : (scale /= 1.2);
        pointX = e.clientX - xs * scale;
        pointY = e.clientY - ys * scale;
        setTransform();
    }
});

function checkImage(image) {
    const MAX_FILE_SIZE = 10 * 1024 * 1024;
    const ALLOW_EXTENSION = ['jpg', 'png', 'gif', 'jpeg'];
    if (image === "") return { 'success': 0, 'message': 'None have to check!' };

    if (image.size >= MAX_FILE_SIZE) return { 'success': 0, 'message': 'File max size is 10 MB' };

    if (ALLOW_EXTENSION.indexOf(image.name.substring(image.name.lastIndexOf('.') + 1)) == -1)
        return { 'success': 0, 'message': 'File allow is JPG, JPEG, PNG, GIF' };
    return { 'success': 1 };
}

function calcMoreInfoImage(tl, tr, bl, br) {
    var image = [];
    // center pixel coordinates
    image['centerX'] = (br['x'] - tl['x']) / 2 + tl['x'];
    image['centerY'] = (br['y'] - tl['y']) / 2 + tl['y'];

    // image size
    image['width'] = Math.sqrt(Math.pow(tr['x'] - tl['x'], 2) + Math.pow(tl['y'] - tr['y'], 2));
    image['height'] = Math.sqrt(Math.pow(bl['y'] - tl['y'], 2) + Math.pow(bl['x'] - tl['x'], 2));
    // image rotated
    image['rotate'] = Math.atan((tl['y'] - tr['y']) / image['width']) * (180 / Math.PI);

    console.log(image);
    return image;
}

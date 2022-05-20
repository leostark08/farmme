$(document).ready(function () {
    const frame = $('#frame');
    const frame_size = { width: 700, height: 700 };
    var image1Ratio = {
        width: frame.width() / frame_size.width,
        height: frame.height() / frame_size.height,
    };
    // image 1
    // coordinates follow: top-left -> top-right -> bottom->right -> bottom-left
    const frameImage1 = calcMoreInfoImage(
        { x: 93, y: 169 },
        { x: 426, y: 131 },
        { x: 451, y: 337 },
        { x: 116, y: 375 },
    );
    const image1 = $('#image1');
    image1.css({
        left: frameImage1.centerX * image1Ratio.width + 'px',
        top: frameImage1.centerY * image1Ratio.height + 'px',
        width: frameImage1.width * image1Ratio.width,
        height: frameImage1.height * image1Ratio.height,
        transform: ' translateX(-50%) translateY(-50%) rotate(-' + frameImage1.rotate + 'deg)',
    });

    // image 2
    const frameImage2 = calcMoreInfoImage(
        { x: 369, y: 389 },
        { x: 629, y: 420 },
        { x: 610, y: 581 },
        { x: 349, y: 549 },
    );
    const image2 = $('#image2');
    image2.css({
        left: frameImage2.centerX * image1Ratio.width + 'px',
        top: frameImage2.centerY * image1Ratio.height + 'px',
        width: frameImage2.width * image1Ratio.width,
        height: frameImage2.height * image1Ratio.height,
        transform: ' translateX(-50%) translateY(-50%) rotate(' + frameImage2.rotate + 'deg)',
    });

    $('#uploadImg1, #uploadImg2').click(function (e) {
        e.preventDefault();
        const pickImg = $(this).parent().find('input[type="file"]');
        pickImg.trigger('click');
        pickImg.change(function () {
            var imageTarget = $(this).data('image');
            var checkImg = checkImage(pickImg.prop('files')[0]);
            var elImageUrl = $(this).parent().find('.imageUrl');
            if (!checkImg.success) {
                alert(checkImg.message);
                return;
            }

            var formData = new FormData();
            formData.append('file', pickImg.prop('files')[0]);
            $.ajax({
                method: 'POST',
                url: 'upload.php',
                contentType: false,
                processData: false,
                dataType: 'text',
                data: formData,
                success: function (data) {
                    $('#' + imageTarget + ' .zoom img').attr('src', data);
                    elImageUrl.val(data);
                },
                error: function () {
                    console.log('abc');
                },
            });
        });
    });

    var imgs = [
        {
            width: frameImage1.width * image1Ratio.width,
            height: frameImage1.height * image1Ratio.height,
            centerX: frameImage1.centerX,
            centerY: frameImage1.centerY,
            scale: 1,
            panning: false,
            pointX: 0,
            pointY: 0,
            start: { x: 0, y: 0 },
        },
        {
            width: frameImage2.width * image1Ratio.width,
            height: frameImage2.height * image1Ratio.height,
            centerX: frameImage2.centerX,
            centerY: frameImage2.centerY,
            scale: 1,
            panning: false,
            pointX: 0,
            pointY: 0,
            start: { x: 0, y: 0 },
        },
    ];

    const zooms = $('.zoom');

    $.each(zooms, function (i, zoom) {
        function setTransform() {
            style = 'translate(' + imgs[i].pointX + 'px, ' + imgs[i].pointY + 'px) scale(' + imgs[i].scale + ')';
            zoom.style.transform = style;
            var data = [imgs[i].pointX, imgs[i].pointY, imgs[i].scale];
            $('#formImg1 input[name="image' + (i + 1) + '"').val(data.toString());
        }
        zoom.onmousedown = function (e) {
            e.preventDefault();
            imgs[i].panning = true;
            imgs[i].start = {
                x: e.clientX - imgs[i].pointX,
                y: e.clientY - imgs[i].pointY,
            };
        };
        zoom.onmouseup = function (e) {
            imgs[i].panning = false;
        };
        zoom.onmousemove = function (e) {
            e.preventDefault();
            if (!imgs[i].panning) return;
            imgs[i].pointX = e.clientX - imgs[i].start.x;
            imgs[i].pointY = e.clientY - imgs[i].start.y;
            setTransform();
        };
        zoom.onwheel = function (e) {
            e.preventDefault();
            var xs = (e.clientX - imgs[i].pointX) / imgs[i].scale,
                ys = (e.clientY - imgs[i].pointY) / imgs[i].scale,
                delta = e.wheelDelta ? e.wheelDelta : -e.deltaY;
            delta > 0 ? (imgs[i].scale += 0.2) : (imgs[i].scale -= 0.1);
            imgs[i].pointX = e.clientX - xs * imgs[i].scale;
            imgs[i].pointY = e.clientY - ys * imgs[i].scale;
            setTransform();
        };
    });
});

function checkImage(image) {
    const MAX_FILE_SIZE = 10 * 1024 * 1024;
    const ALLOW_EXTENSION = ['jpg', 'png', 'gif', 'jpeg'];
    if (image === '') return { success: 0, message: 'None have to check!' };

    if (image.size >= MAX_FILE_SIZE) return { success: 0, message: 'File max size is 10 MB' };

    if (ALLOW_EXTENSION.indexOf(image.name.substring(image.name.lastIndexOf('.') + 1)) == -1)
        return { success: 0, message: 'File allow is JPG, JPEG, PNG, GIF' };
    return { success: 1 };
}

function calcMoreInfoImage(tl, tr, br, bl) {
    var image = [];
    // center pixel coordinates
    image['centerX'] = (br['x'] - tl['x']) / 2 + tl['x'];
    image['centerY'] = (br['y'] - tl['y']) / 2 + tl['y'];

    // image size
    image['width'] = Math.sqrt(Math.pow(tr['x'] - tl['x'], 2) + Math.pow(tl['y'] - tr['y'], 2));
    image['height'] = Math.sqrt(Math.pow(bl['y'] - tl['y'], 2) + Math.pow(bl['x'] - tl['x'], 2));
    // image rotated
    image['rotate'] = Math.atan(Math.abs(tl['y'] - tr['y']) / image['width']) * (180 / Math.PI);

    console.log(image);
    return image;
}

function imageInImage(translate, width, height, scale) {
    if (
        translate.x >= -width * Math.abs(scale - 1) &&
        translate.x <= width * Math.abs(scale - 1) &&
        translate.y >= -height * Math.abs(scale - 1) &&
        translate.y <= height * Math.abs(scale - 1)
    )
        return true;
    return false;
}

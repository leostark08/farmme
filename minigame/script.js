$(document).ready(function () {
    const frame = $('#frame');
    const frame_size = { width: 700, height: 700 };
    var ratio = {
        width: frame.width() / frame_size.width,
        height: frame.height() / frame_size.height,
    };

    const images = [
        {
            topLeft: { x: 93, y: 169 },
            topRight: { x: 426, y: 131 },
            bottomRight: { x: 451, y: 337 },
            bottomLeft: { x: 116, y: 375 },
        },
        {
            topLeft: { x: 369, y: 389 },
            topRight: { x: 629, y: 420 },
            bottomRight: { x: 610, y: 581 },
            bottomLeft: { x: 349, y: 549 },
        },
    ];

    var imageEls = $('.child-image');

    $.each(images, function (index, image) {
        images[index] = {
            ...image,
            ...calcMoreInfoImage(image.topLeft, image.topRight, image.bottomRight, image.bottomLeft),
        };
    });
    $.each(imageEls, function (index, image) {
        $(this).css({
            left: images[index].centerX * ratio.width + 'px',
            top: images[index].centerY * ratio.height + 'px',
            width: images[index].width * ratio.width + 'px',
            height: images[index].height * ratio.height + 'px',
            transform: 'translate(-50%, -50%) rotate(' + -images[index].angle + 'deg)',
        });
    });

    // UPLOAD IMAGES
    $('.btn-upload').click(function () {
        var picker = $(this).data('picker');
        $('#' + picker).trigger('click');
        var _URL = window.URL || window.webkitURL;
        $('#' + picker).change(function () {
            var target = $(this).data('target');
            if ((file = this.files[0])) {
                var check = checkFile(file);
                if (check.success) {
                    $('#' + target).addClass('in');
                    img = new Image();
                    var objectUrl = _URL.createObjectURL(file);
                    img.onload = function () {
                        $('#' + target)
                            .find('img')
                            .attr({
                                src: _URL.createObjectURL(file),
                                'data-height': this.height,
                                'data-width': this.width,
                            });
                        initTranslateSize();
                        _URL.revokeObjectURL(objectUrl);
                    };
                    img.src = objectUrl;
                } else alert(check.message);
            } else alert('No files were uploaded!');
        });
    });

    // ZOOM IMAGES
    const ZOOM_RANGE = { MAX: 2, MIN: 1 };
    var zoomAttrs = [
        {
            scale: 1,
            panning: false,
            pointX: 0,
            pointY: 0,
            start: { x: 0, y: 0 },
        },
        {
            scale: 1,
            panning: false,
            pointX: 0,
            pointY: 0,
            start: { x: 0, y: 0 },
        },
    ];
    const zoomEls = $('.zoom');

    function initTranslateSize() {
        $.each(zoomAttrs, function (i, el) {
            var h = zoomEls[i].getAttribute('data-height');
            var w = zoomEls[i].getAttribute('data-width');
            zoomAttrs[i].translateRange = {
                initW: w,
                initH: h,
                minX: -images[i].width * 0.5,
                minY: images[i].height / 2 - (images[i].width * h) / w,
                maxX: images[i].width / 2,
                maxY: images[i].height / 2,
            };
        });
        calcTranslateRange();
    }

    function calcTranslateRange() {
        $.each(zoomEls, function (i, el) {
            zoomAttrs[i].translateRange.minX = images[i].width * (0.5 - zoomAttrs[i].scale);
            zoomAttrs[i].translateRange.minY =
                images[i].height / 2 -
                ((images[i].width * zoomAttrs[i].translateRange.initH) / zoomAttrs[i].translateRange.initW) *
                    zoomAttrs[i].scale;
        });
    }

    $.each(zoomEls, function (i, el) {
        // SET TRANSFORM
        function setTransform() {
            transform =
                'translate(' +
                zoomAttrs[i].pointX +
                'px, ' +
                zoomAttrs[i].pointY +
                'px) scale(' +
                zoomAttrs[i].scale +
                ')';

            el.style.transform = transform;
            el.setAttribute('data-x', zoomAttrs[i].pointX);
            el.setAttribute('data-y', zoomAttrs[i].pointY);
            el.setAttribute('data-s', zoomAttrs[i].scale);
        }

        el.onmousedown = (e) => {
            e.preventDefault();
            zoomAttrs[i].panning = true;
            zoomAttrs[i].start = {
                x: e.clientX - zoomAttrs[i].pointX,
                y: e.clientY - zoomAttrs[i].pointY,
            };
        };
        el.onmouseup = (e) => {
            console.log(zoomAttrs);
            zoomAttrs[i].panning = false;
        };
        el.onmousemove = (e) => {
            e.preventDefault();
            if (!zoomAttrs[i].panning) return;
            var tX = e.clientX - zoomAttrs[i].start.x,
                tY = e.clientY - zoomAttrs[i].start.y;

            zoomAttrs[i].pointX =
                tX < zoomAttrs[i].translateRange.minX
                    ? zoomAttrs[i].translateRange.minX
                    : tX > zoomAttrs[i].translateRange.maxX
                    ? zoomAttrs[i].translateRange.maxX
                    : tX;

            zoomAttrs[i].pointY =
                tY < zoomAttrs[i].translateRange.minY
                    ? zoomAttrs[i].translateRange.minY
                    : tY > zoomAttrs[i].translateRange.maxY
                    ? zoomAttrs[i].translateRange.maxY
                    : tY;
            setTransform();
        };
        el.onmouseout = (e) => {
            zoomAttrs[i].panning = false;
        };
        el.onwheel = (e) => {
            e.preventDefault();
            var xs = (e.clientX - zoomAttrs[i].pointX) / zoomAttrs[i].scale,
                ys = (e.clientY - zoomAttrs[i].pointY) / zoomAttrs[i].scale,
                delta = e.wheelDelta ? e.wheelDelta : -e.deltaY;
            delta > 0 ? (zoomAttrs[i].scale *= 1.2) : (zoomAttrs[i].scale /= 1.2);
            zoomAttrs[i].scale = zoomAttrs[i].scale > ZOOM_RANGE.MAX ? ZOOM_RANGE.MAX : zoomAttrs[i].scale;
            zoomAttrs[i].scale = zoomAttrs[i].scale < ZOOM_RANGE.MIN ? ZOOM_RANGE.MIN : zoomAttrs[i].scale;
            zoomAttrs[i].pointX = e.clientX - xs * zoomAttrs[i].scale;
            zoomAttrs[i].pointY = e.clientY - ys * zoomAttrs[i].scale;

            calcTranslateRange();
            setTransform();
        };
    });

    $('.btn-download').click(function (e) {
        var attrs = [];
        var f;
        var formData = new FormData();
        $.each(zoomEls, function (i, el) {
            f = $('#pick-' + (i + 1))[0].files[0];
            if (f) {
                formData.append('file[]', f);
                attrs.push({
                    x: $(el).attr('data-x') || 0,
                    y: $(el).attr('data-y') || 0,
                    s: $(el).attr('data-s') || 1,
                    width: images[i].width,
                    height: images[i].height,
                    angle: images[i].angle,
                });
            }
        });

        formData.append('attrs', JSON.stringify(attrs));

        $.ajax({
            url: 'generate.php',
            method: 'POST',
            dataType: 'text',
            contentType: false,
            processData: false,
            data: formData,
            success: (res) => {
                console.log(res);
            },
            error: () => {
                console.log('upload failure');
            },
        });
    });
});

function calcMoreInfoImage(tl, tr, br, bl) {
    var image = {};
    // center pixel coordinates
    image.centerX = (br.x - tl.x) / 2 + tl.x;
    image.centerY = (br.y - tl.y) / 2 + tl.y;

    // image size
    image.width = Math.sqrt(Math.pow(tr.x - tl.x, 2) + Math.pow(tl.y - tr.y, 2));
    image.height = Math.sqrt(Math.pow(bl.y - tl.y, 2) + Math.pow(bl.x - tl.x, 2));
    // image angle
    image.angle = Math.atan((tl.y - tr.y) / image.width) * (180 / Math.PI);

    console.log(image);
    return image;
}

const MAX_FILE_SIZE = 3.2 * 1024 * 1024; //3.2MB
function checkFile(file) {
    if (!!file.type.match('image')) {
        return file.size <= MAX_FILE_SIZE
            ? { success: true }
            : { success: false, message: 'The max file size allowed to upload is 3.2 MB!' };
    }
    return { success: false, message: 'The file uploaded is not images' };
}

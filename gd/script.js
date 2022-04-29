$(document).ready(function () {
    const frame = $('#frame');
    const frame_size = { 'width': 700, 'height': 700 };
    const frameImage1 = { 'width': 348, 'height': 217, 'x': 271, 'y': 255, 'rotate': 6.6 };

    const image1 = $('#image1');

    var image1Ratio = { 'width': frame.width() / frame_size.width, 'height': frame.height() / frame_size.height }

    image1.css({ 'left': frameImage1.x * image1Ratio.width + 'px', 'top': frameImage1.y * image1Ratio.height + 'px', 'width': frameImage1.width * image1Ratio.width, 'height': frameImage1.height * image1Ratio.height, 'transform': ' translateX(-50%) translateY(-50%) rotate(-' + frameImage1.rotate + 'deg)' });


    $('#uploadImg1').click(function (e) {
        e.preventDefault();
        const pickImg1 = $('#pickImg1');
        pickImg1.trigger('click');
        pickImg1.change(function () {
            if (checkImage(pickImg1.prop('files')[0])) {

            }
        });
        // $.post('upload.php', {}, function (res) {
        //     alert(res);
        // });
    });
});

function checkImage(image) {
    const MAX_FILE_SIZE = 10 * 1024 * 1024;
    const ALLOW_EXTENSION = ['jpg', 'png', 'gif', 'jpeg'];
    if (image === "") return 'None have to check!';

    if (image.size >= MAX_FILE_SIZE) return 'File max size is 10 MB';

    if (ALLOW_EXTENSION.indexOf(image.name.substring(image.name.lastIndexOf('.') + 1)) == -1)
        return 'File allow is JPG, JPEG, PNG, GIF';
    return 1;
}
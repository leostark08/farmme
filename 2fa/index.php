<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body data-new-gr-c-s-check-loaded="9.54.0" data-gr-ext-installed="">
    <input id="code" style="width:100%;padding:20px;" value="Tinhx">
    <p id="updatingIn">29</p>
    <input id="baomat" style="width:100%;padding:20px;">
    <span id="res"></span>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"
    integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function dec2hex(s) {
    return (s < 15.5 ? '0' : '') + Math.round(s).toString(16);
}

function hex2dec(s) {
    return parseInt(s, 16);
}

function base32tohex(base32) {
    var base32chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";
    var bits = "";
    var hex = "";

    for (var i = 0; i < base32.length; i++) {
        var val = base32chars.indexOf(base32.charAt(i).toUpperCase());
        bits += leftpad(val.toString(2), 5, '0');
    }
    for (var i = 0; i + 4 <= bits.length; i += 4) {
        var chunk = bits.substr(i, 4);
        hex = hex + parseInt(chunk, 2).toString(16);
    }
    return hex;
}

function leftpad(str, len, pad) {
    if (len + 1 >= str.length) {
        str = Array(len + 1 - str.length).join(pad) + str;
    }
    return str;
}

function updateOtp(secret, epoch) {
    var key = base32tohex(secret);
    var time = leftpad(dec2hex(Math.floor(epoch / 30)), 16, '0');
    var hmac = CryptoJS.HmacSHA1(time, key).toString();

    console.log("hmac: " + hmac);

    var offset = hex2dec(hmac.substring(hmac.length - 1));
    var otp = (hex2dec(hmac.substr(offset * 2, 8)) & hex2dec('7fffffff')) + '';
    otp = (otp).substr(otp.length - 6, 6);
    $("#baomat").val(otp);
    console.log(key);
    return otp;
}

function timer(baomat, epoch) {
    var countDown = 30 - (epoch % 30);
    $('#updatingIn').text(countDown);
    return updateOtp(baomat, epoch);
}
setInterval(function() {
    var epoch = Math.round(new Date().getTime() / 1000.0);
    var secret = $("#code").val().replace(/ /gis, '');
    var otp = timer(secret, epoch);
    $.post('auth.php', {
        t: epoch,
        otp: otp
    }, function(res) {
        $('#res').text(res);
    })
}, 1000);
</script>

</html>
const MILLISECOND_HASH_STEP = 5000;
const elKey = $('#g-key');
const elHash = $('#g-hash');
const startTime = Date.now();
var diff = 0;
var count = 0;
$(document).ready(function () {
    changeHash();
    setInterval(function () {
        count++;
        if (count > 5) {
            changeSecret();
            count = 0;
        }
        else changeHash();
    }, MILLISECOND_HASH_STEP);

})

$('input[type="submit"]').click(function (e) {
    e.preventDefault();
    var sum = 0;

    elCheckboxs = $('#checkArray input[type="checkbox"]:checked');

    if (elCheckboxs.length > 0) {
        $.each(elCheckboxs, function (elCb) {
            sum += parseInt($(this).val());
        });
    }
    body = {
        'username': $('#username').val(),
        'role': sum,
    }
    data = { diff: diff, hash: elHash.val(), body: body };
    $.post('register.php', data, function (result) {
        result = JSON.parse(result);
        if (result.status)
            window.location.reload();
        else alert(result.message)
    });

});

$(elKey).change(function (e) {
    changeHash();
});

function encryptData(key, data) {
    if (typeof data == "string")
        data = data.slice();
    else
        data = JSON.stringify(data);
    encryptedString = sha256.hmac(key, data);
    return encryptedString.toString();
}

function changeHash() {
    var secret = elKey.val();
    diff = Date.now() - startTime;
    var encryptedString = encryptData(secret, diff);
    elHash.val(encryptedString);
}

function changeSecret() {
    $.post('key.php', function (result) {
        elKey.val(result);
        elKey.change();
    });
}
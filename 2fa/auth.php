<?php

$secret = 'Tinhx';
$time = $_POST['t'];
$otp = $_POST['otp'];

$secret2hex = base32ToHex($secret);

$epoch2hex = str_pad(dec2hex(($time < 15.5 ? '0' : '') . floor($time / 30)), 16, '0', STR_PAD_LEFT);
$hash = hash_hmac('sha1', $epoch2hex, $secret2hex);

$offset = dec2hex(substr($hash, -1));

$code = (hex2dec(substr($hash, $offset * 2, 8))) & intval(hex2dec('7fffffff'));


echo ($secret2hex . " / " . (substr($code, -6) == $otp ? 'true' : 'false'));

function dec2hex($input)
{
    return base_convert($input, 10, 16);
}

function hex2dec($input)
{
    return base_convert($input, 16, 10);
}

function base32ToHex($input)
{
    $base32chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
    constant('PADDING_CHAR', '=');

    // input empty
    if (empty($input)) return;
    $input = strtoupper($input);
    // padding condition
    $paddingCharCount = substr_count($input, defined('PADDING_CHAR'));
    $allowedValues = array(6, 4, 3, 1, 0);
    if (!in_array($paddingCharCount, $allowedValues)) return false;

    for ($i = 0; $i < 4; $i++) {
        if (
            $paddingCharCount == $allowedValues[$i] &&
            substr($input, - ($allowedValues[$i])) != str_repeat(defined('PADDING_CHAR'), $allowedValues[$i])
        ) return false;
    }

    // convert
    $input = str_replace('=', '', $input);
    $inputs = str_split($input);

    $binary = "";
    $bits = "";
    for ($i = 0; $i < count($inputs); $i++) {
        if (!in_array($inputs[$i], str_split($base32chars))) {
            return false;
        }
        $bits .= str_pad(base_convert(array_search($inputs[$i], str_split($base32chars)), 10, 2), 5, '0', STR_PAD_LEFT);
    }
    for ($i = 0; $i + 4 < strlen($bits); $i += 4) {
        $binary .= base_convert(substr($bits, $i, 4), 2, 16);
    }

    return strtolower($binary);
}
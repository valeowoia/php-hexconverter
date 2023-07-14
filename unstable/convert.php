<?php
if (isset($_POST['convert'])) {
    $input = $_POST['input'];
    $inputFormat = $_POST['format'];
    $outputFormat = $_POST['output_format'];

    switch ($inputFormat) {
        case 'bin':
            if ($outputFormat === 'dec') {
                $output = binaryToDecimal($input);
            } elseif ($outputFormat === 'hex') {
                $output = binaryToHexadecimal($input);
            } elseif ($outputFormat === 'oct') {
                $output = binaryToOctal($input);
            } elseif ($outputFormat === 'text') {
                $output = binaryToText($input);
            }
            break;
        case 'dec':
            if ($outputFormat === 'text') {
                $output = decimalToText($input);
            } elseif ($outputFormat === 'bin') {
                $output = decimalToBinary($input);
            } elseif ($outputFormat === 'oct') {
                $output = decimalToOctal($input);
            } elseif ($outputFormat === 'hex') {
                $output = decimalToHexadecimal($input);
            }
            break;
        case 'hex':
            if ($outputFormat === 'text') {
                $output = hexadecimalToText($input);
            } elseif ($outputFormat === 'bin') {
                $output = hexadecimalToBinary($input);
            } elseif ($outputFormat === 'dec') {
                $output = hexadecimalToDecimal($input);
            } elseif ($outputFormat === 'oct') {
                $output = hexadecimalToOctal($input);
            }
            break;
        case 'oct':
            if ($outputFormat === 'text') {
                $output = octalToText($input);
            } elseif ($outputFormat === 'bin') {
                $output = octalToBinary($input);
            } elseif ($outputFormat === 'hex') {
                $output = octalToHexadecimal($input);
            } elseif ($outputFormat === 'dec') {
                $output = octalToDecimal($input);
            }
            break;
        case 'text':
            if ($outputFormat === 'bin') {
                $output = textToBinary($input);
            } elseif ($outputFormat === 'dec') {
                $output = textToDecimal($input);
            } elseif ($outputFormat === 'hex') {
                $output = textToHexadecimal($input);
            } elseif ($outputFormat === 'oct') {
                $output = textToOctal($input);
            }
            break;
        default:
            $output = $input;
            break;
    }

    echo json_encode($output);
}

function binaryToText($binary) {
    $binaryArr = explode(' ', $binary);
    $text = '';
    foreach ($binaryArr as $bin) {
        $text .= chr(bindec($bin));
    }
    return $text;
}
function binaryToDecimal($input)
{
    $dec = bindec($input);
    return $dec;
}

function binaryToHexadecimal($input)
{
    $dec = bindec($input);
    $hex = dechex($dec);
    return $hex;
}

function binaryToOctal($input)
{
    $dec = bindec($input);
    $oct = decoct($dec);
    return $oct;
}

function decimalToText($input)
{
    $text = chr($input);
    return $text;
}

function decimalToBinary($input)
{
    $bin = decbin($input);
    return $bin;
}

function decimalToOctal($input)
{
    $oct = decoct($input);
    return $oct;
}

function decimalToHexadecimal($input)
{
    $hex = dechex($input);
    return $hex;
}

function hexadecimalToText($input)
{
    $text = hex2bin($input);
    return $text;
}

function hexadecimalToBinary($input)
{
    $dec = hexdec($input);
    $bin = decbin($dec);
    return $bin;
}

function hexadecimalToDecimal($input)
{
    $dec = hexdec($input);
    return $dec;
}

function hexadecimalToOctal($input)
{
    $dec = hexdec($input);
    $oct = decoct($dec);
    return $oct;
}

function octalToText($input)
{
    $dec = octdec($input);
    $text = chr($dec);
    return $text;
}

function octalToBinary($input)
{
    $dec = octdec($input);
    $bin = decbin($dec);
    return $bin;
}

function octalToHexadecimal($input)
{
    $dec = octdec($input);
    $hex = dechex($dec);
    return $hex;
}

function octalToDecimal($input)
{
    $dec = octdec($input);
    return $dec;
}

function textToBinary($input)
{
    $bin = '';
    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];
        $bin .= decbin(ord($char));
    }
    return $bin;
}

function textToDecimal($input)
{
    $dec = ord($input);
    return $dec;
}

function textToHexadecimal($input)
{
    $hex = bin2hex($input);
    return $hex;
}

function textToOctal($input)
{
    $oct = '';
    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];
        $oct .= decoct(ord($char));
    }
    return $oct;
}

?>

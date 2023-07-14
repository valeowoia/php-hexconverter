<?php
if (isset($_POST['convert'])) {
    $input = $_POST['input'];
    $inputFormat = $_POST['format'];
    $outputFormat = $_POST['output_format'];
    $output = '';

    switch ($inputFormat) {
        case 'text':
            switch ($outputFormat) {
                case 'binary':
                    $output = textToBinary($input);
                    break;
                case 'decimal':
                    $output = textToDecimal($input);
                    break;
                case 'hexadecimal':
                    $output = textToHexadecimal($input);
                    break;
                case 'octal':
                    $output = textToOctal($input);
                    break;
                default:
                    $output = $input;
                    break;
            }
            break;
        case 'binary':
            switch ($outputFormat) {
                case 'text':
                    $output = binaryToText($input);
                    break;
                case 'decimal':
                    $output = binaryToDecimal($input);
                    break;
                case 'hexadecimal':
                    $output = binaryToHexadecimal($input);
                    break;
                case 'octal':
                    $output = binaryToOctal($input);
                    break;
            }
            break;
        case 'decimal':
            switch ($outputFormat) {
                case 'text':
                    $output = decimalToText($input);
                    break;
                case 'binary':
                    $output = decimalToBinary($input);
                    break;
                case 'hexadecimal':
                    $output = decimalToHexadecimal($input);
                    break;
                case 'octal':
                    $output = decimalToOctal($input);
                    break;
            }
            break;
        case 'hexadecimal':
            switch ($outputFormat) {
                case 'text':
                    $output = hexadecimalToText($input);
                    break;
                case 'binary':
                    $output = hexadecimalToBinary($input);
                    break;
                case 'decimal':
                    $output = hexadecimalToDecimal($input);
                    break;
                case 'octal':
                    $output = hexadecimalToOctal($input);
                    break;
            }
            break;
        case 'octal':
            switch ($outputFormat) {
                case 'text':
                    $output = octalToText($input);
                    break;
                case 'binary':
                    $output = octalToBinary($input);
                    break;
                case 'decimal':
                    $output = octalToDecimal($input);
                    break;
                case 'hexadecimal':
                    $output = octalToHexadecimal($input);
                    break;
            }
            break;
    }

    echo $output;
}

function textToBinary($text) {
    return implode(' ', array_map(function ($char) {
        return decbin(ord($char));
    }, str_split($text)));
}

function textToDecimal($text) {
    return implode(' ', array_map(function ($char) {
        return ord($char);
    }, str_split($text)));
}

function textToHexadecimal($text) {
    return implode(' ', array_map(function ($char) {
        return dechex(ord($char));
    }, str_split($text)));
}

function textToOctal($text) {
    return implode(' ', array_map(function ($char) {
        return decoct(ord($char));
    }, str_split($text)));
}

function binaryToText($binary) {
    $binaryArr = explode(' ', $binary);
    $text = '';
    foreach ($binaryArr as $bin) {
        $text .= chr(bindec($bin));
    }
    return $text;
}

function binaryToDecimal($binary) {
    return bindec($binary);
}

function binaryToHexadecimal($binary) {
    $decimal = bindec($binary);
    return dechex($decimal);
}

function binaryToOctal($binary) {
    $decimal = bindec($binary);
    return decoct($decimal);
}

function decimalToText($decimal) {
    return chr($decimal);
}

function decimalToBinary($decimal) {
    return decbin($decimal);
}

function decimalToHexadecimal($decimal) {
    return dechex($decimal);
}

function decimalToOctal($decimal) {
    return decoct($decimal);
}

function hexadecimalToText($hexadecimal) {
    $hexArr = explode(' ', $hexadecimal);
    $text = '';
    foreach ($hexArr as $hex) {
        $text .= chr(hexdec($hex));
    }
    return $text;
}

function hexadecimalToBinary($hexadecimal) {
    $decimal = hexdec($hexadecimal);
    return decbin($decimal);
}

function hexadecimalToDecimal($hexadecimal) {
    return hexdec($hexadecimal);
}

function hexadecimalToOctal($hexadecimal) {
    $decimal = hexdec($hexadecimal);
    return decoct($decimal);
}

function octalToText($octal) {
    $octalArr = explode(' ', $octal);
    $text = '';
    foreach ($octalArr as $oct) {
        $text .= chr(octdec($oct));
    }
    return $text;
}

function octalToBinary($octal) {
    $decimal = octdec($octal);
    return decbin($decimal);
}

function octalToHexadecimal($octal) {
    $decimal = octdec($octal);
    return dechex($decimal);
}

function octalToDecimal($octal) {
    return octdec($octal);
}
?>
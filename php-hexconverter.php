<?php
// Функция для конвертации текста в HEX
function textToHex($text) {
    $hex = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $hex .= dechex(ord($text[$i]));
    }
    return $hex;
}

// Функция для конвертации HEX в текст
function hexToText($hex) {
    $text = '';
    for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
        $text .= chr(hexdec($hex[$i] . $hex[$i + 1]));
    }
    return $text;
}

// Функция для конвертации десятичного числа в HEX
function decimalToHex($decimal) {
    return dechex($decimal);
}

// Функция для конвертации HEX в десятичное число
function hexToDecimal($hex) {
    return hexdec($hex);
}

// Функция для конвертации бинарного кода в HEX
function binaryToHex($binary) {
    $hex = '';
    $binary = str_split($binary, 4);
    foreach ($binary as $chunk) {
        $hex .= dechex(bindec($chunk));
    }
    return $hex;
}

// Функция для конвертации HEX в бинарный код
function hexToBinary($hex) {
    $binary = '';
    for ($i = 0; $i < strlen($hex); $i++) {
        $binary .= sprintf("%04b", hexdec($hex[$i]));
    }
    return $binary;
}

// Функция для конвертации восьмеричного числа в HEX
function octalToHex($octal) {
    return dechex(octdec($octal));
}

// Функция для конвертации HEX в восьмеричное число
function hexToOctal($hex) {
    return decoct(hexdec($hex));
}

// Обработка запроса
if (isset($_POST['convert'])) {
    $inputValue = $_POST['inputValue'];
    $conversionType = $_POST['conversionType'];
    $result = '';

    switch ($conversionType) {
        case 'textToHex':
            $result = textToHex($inputValue);
            break;
        case 'hexToText':
            $result = hexToText($inputValue);
            break;
        case 'decimalToHex':
            $result = decimalToHex($inputValue);
            break;
        case 'hexToDecimal':
            $result = hexToDecimal($inputValue);
            break;
        case 'binaryToHex':
            $result = binaryToHex($inputValue);
            break;
        case 'hexToBinary':
            $result = hexToBinary($inputValue);
            break;
        case 'octalToHex':
            $result = octalToHex($inputValue);
            break;
        case 'hexToOctal':
            $result = hexToOctal($inputValue);
            break;
        default:
            $result = 'Invalid conversion type';
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HEX Converter</title>
</head>
<body>
    <h1>HEX Converter</h1>
    <form method="POST" action="">
        <label for="inputValue">Input Value:</label>
        <input type="text" name="inputValue" id="inputValue" required>
        <br><br>
        <label for="conversionType">Conversion Type:</label>
        <select name="conversionType" id="conversionType" required>
            <option value="textToHex">Text to HEX</option>
            <option value="hexToText">HEX to Text</option>
            <option value="decimalToHex">Decimal to HEX</option>
            <option value="hexToDecimal">HEX to Decimal</option>
            <option value="binaryToHex">Binary to HEX</option>
            <option value="hexToBinary">HEX to Binary</option>
            <option value="octalToHex">Octal to HEX</option>
            <option value="hexToOctal">HEX to Octal</option>
        </select>
        <br><br>
        <input type="submit" name="convert" value="Convert">
    </form>
    <br>
    <?php if (isset($result)) { ?>
        <label for="result">Result:</label>
        <input type="text" id="result" value="<?php echo $result; ?>" readonly>
    <?php } ?>
</body>
</html>

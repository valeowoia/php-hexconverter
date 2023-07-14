<?php
// text to hex
function textToHex($text) {
    $hex = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $hex .= dechex(ord($text[$i]));
    }
    return $hex;
}

// hex to text
function hexToText($hex) {
    $text = '';
    for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
        $text .= chr(hexdec($hex[$i] . $hex[$i + 1]));
    }
    return $text;
}

// dec to hex
function decimalToHex($decimal) {
    return dechex($decimal);
}

// hex to dec
function hexToDecimal($hex) {
    return hexdec($hex);
}

// bin to hex
function binaryToHex($binary) {
    $hex = '';
    $binary = str_split($binary, 4);
    foreach ($binary as $chunk) {
        $hex .= dechex(bindec($chunk));
    }
    return $hex;
}

// hex to bin
function hexToBinary($hex) {
    $binary = '';
    for ($i = 0; $i < strlen($hex); $i++) {
        $binary .= sprintf("%04b", hexdec($hex[$i]));
    }
    return $binary;
}

// oct to hex
function octalToHex($octal) {
    return dechex(octdec($octal));
}

// hex to oct
function hexToOctal($hex) {
    return decoct(hexdec($hex));
}

// conversion table
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
        <br>
        <textarea name="inputValue" id="inputValue" rows="5" cols="50" required></textarea>
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
        <br>
        <textarea id="result" rows="5" cols="50" readonly><?php echo $result; ?></textarea>
    <?php } ?>
</body>
</html>

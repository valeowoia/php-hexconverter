<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Converter</title>
    <style>
        @font-face {
            font-family: 'IBM VGA8';
            src: url('font.ttf');
        }
        body {
            background-color: #212121;
            color: #fff;
            font-family: 'IBM VGA8', sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #444;
            border-radius: 10px;
            margin-top: 2%;
        }

        textarea {
            width: 100%;
            height: 200px;
            resize: none;
            background-color: #454d47;
            border: none;
            color: #fff;
            font-size: 16px;
        }

        select {
            background-color: #454d47;
            border: none;
            font-size: 16px;
            color: #fff;
            text-align: center;
            height: 35px;
            font-family: IBM VGA8;
            width: 100%;
        }

        .btn {
            background-color: #128459;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            cursor: pointer;
            font-family: IBM VGA8;
            width: 100%;
        }

        label {
            display: flex;
            margin-top: 5px;
            margin-bottom: 5px;
            justify-content: center;
            font-size: 18px;
        }
        h2 {
            display: flex;
            margin-top: 5px;
            margin-bottom: 5px;
            justify-content: center;
        }

        a {
            color: #fff;
            font-weight: bold;
            display: flex;
            margin-top: 5px;
            margin-bottom: 5px;
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data converter</h2>
    <form method="post">
        <label for="input">Input:</label>
        <textarea name="input" id="input" placeholder=""></textarea>
        <br>
        <br>
        <label for="format">Input data format:</label>

        <select name="format" id="format">
            <option value="text">text</option>
            <option value="binary">binary</option>
            <option value="decimal">decimal</option>
            <option value="hexadecimal">hexadecimal</option>
            <option value="octal">octadecimal</option>
        </select>
        <br>
        <br>
        <label for="output_format">Output data format:</label>
        <select name="output_format" id="output_format">
            <option value="text">text</option>
            <option value="binary">binary</option>
            <option value="decimal">decimal</option>
            <option value="hexadecimal">hexadecimal</option>
            <option value="octal">octadecimal</option>
        </select>
        <br>
        <br>
        <input type="submit" name="convert" value="Convert" class="btn">
        <br>
        <br>
        <label for="output">Output:</label>
        <textarea name="output" id="output" readonly="">

        </textarea>
        
        <br>
        
    </form>
</div>

<?php
if (isset($_POST['convert'])) {
    $input = $_POST['input'];
    $inputFormat = $_POST['format'];
    $outputFormat = $_POST['output_format'];
    $output = '';

    if ($inputFormat === 'text') {
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
    } elseif ($inputFormat === 'binary') {
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
            default:
                $output = $input;
                break;
        }
    } elseif ($inputFormat === 'decimal') {
        switch ($outputFormat) {
            case 'text':
                $output = decimalToText($input);
                break;
            case 'binary':
                $output = decimalToBinary($input);
                break;
            case 'octal':
                $output = decimalToOctal($input);
                break;
            case 'hexadecimal':
                $output = decimalToHexadecimal($input);
                break;
            default:
                $output = $input;
                break;
        }
    } elseif ($inputFormat === 'hexadecimal') {
        switch ($outputFormat) {
            case 'text':
                $output = hexadecimalToText($input);
                break;
            case 'binary';
                $output = hexadecimalToBinary($input);
                break;
            case 'decimal';
                $output = hexadecimalToDecimal($input);
                break;
            case 'octal';
                $output = hexadecimalToOctal($input);
                break;
            default:
                $output = $input;
                break;
        }
    } elseif ($inputFormat === 'octal') {
        switch ($outputFormat) {
            case 'text':
                $output = octalToText($input);
                break;
            case 'binary':
                $output = octalToBinary($input);
                break;
            case 'hexadecimal':
                $output = octalToHexadecimal($input);
                break;
            case 'decimal':
                $output = octalToDecimal($input);
                break;
            default:
                $output = $input;
                break;
        }
    }

    echo "<script>document.getElementById('output').value = '$output';</script>";
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
</body>
<footer>
    <div class="container">
        <label>Copyleft 2023</label>
        <a href="https://github.com/valeowoia/php-hexconverter" target="_blank"> valeowoia/php-hexconverter</a>
    </div>
</footer>
</html>

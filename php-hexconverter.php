<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Конвертер</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans">
    <style>
        body {
            background-color: #212121;
            color: #fff;
            font-family: 'IBM Plex Sans', sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
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

        .btn {
            background-color: #2196F3;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data converter</h2>
    <form method="post">
        <label for="input">Input:</label><br>
        <textarea name="input" id="input" placeholder=""></textarea><br><br>
        <label for="format">Input data format:</label><br>
        <select name="format" id="format">
            <option value="text">text</option>
            <option value="binary">binary</option>
            <option value="decimal">decimal</option>
            <option value="hexadecimal">hexadecimal</option>
            <option value="octal">octadecimal</option>
        </select><br><br>
        <label for="output">output:</label><br>
        <textarea name="output" id="output" readonly></textarea><br><br>
        <label for="output_format">Output data format:</label><br>
        <select name="output_format" id="output_format">
            <option value="text">text</option>
            <option value="binary">binary</option>
            <option value="decimal">decimal</option>
            <option value="hexadecimal">hexadecimal</option>
            <option value="octal">octadecimal</option>
        </select><br><br>
        <input type="submit" name="convert" value="Convert" class="btn">
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
        }
    } elseif ($inputFormat === 'decimal') {
    } elseif ($inputFormat === 'hexadecimal') {
    } elseif ($inputFormat === 'octal') {
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
?>
</body>
</html>

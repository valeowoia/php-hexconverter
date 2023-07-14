<!DOCTYPE html>
<html>
<head>
    <title>HEX Converter</title>
</head>
<body>
    <h1>HEX Converter</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Input value:</label>
        <input type="text" name="value" placeholder="...">
        <select name="conversionType">
            <option value="toHex">to hexd</option>
            <option value="fromHex">from hex</option>
        </select>
        <input type="submit" value="Convert">
    </form>

    <?php
        function decimalToHex($decimalValue) {
        return dechex($decimalValue);
    }
    
    function hexToDecimal($hexValue) {
        return hexdec($hexValue);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value = $_POST["value"];
        $conversionType = $_POST["conversionType"];
        
        $value = preg_replace('/[^A-Fa-f0-9]/', '', $value);
        
        if (preg_match('/^[A-Fa-f0-9]+$/', $value)) {
            if ($conversionType == "toHex") {
                $hexValue = decimalToHex($value);
                echo "<p>hex value: $hexValue</p>";
            } elseif ($conversionType == "fromHex") {
                $decimalValue = hexToDecimal($value);
                echo "<p>Decimal value: $decimalValue</p>";
            }
        } else {
            echo "<p>Incorrect value!</p>";
        }
    }
    ?>
</body>
</html>

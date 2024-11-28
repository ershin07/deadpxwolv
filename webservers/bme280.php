<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BME280 Sensor Readings</title>
</head>
<body>
    <h1>BME280 Sensor Readings</h1>
    <form method="post">
        <button type="submit" name="read_sensor">Get Sensor Readings</button>
    </form>

    <?php
    if (isset($_POST['read_sensor'])) {
        // Execute the sensor reading script
        $raw = `./bme280`;

        // Decode the JSON-formatted data
        $deserialized = json_decode($raw, true);

        // Display the readings
        echo "<p>Temperature: " . $deserialized["temperature"] . " °C</p>";
        echo "<p>Pressure: " . $deserialized["pressure"] . " hPa</p>";
        echo "<p>Altitude: " . $deserialized["altitude"] . " m</p>";
    }
    ?>
</body>
</html>

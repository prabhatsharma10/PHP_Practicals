<?php
$apiKey = '95ce995b778b2aae251663c49ad6d892';
$defaultCity = 'New Delhi';
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING) ?: $defaultCity;

$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid={$apiKey}&units=metric";
$response = @file_get_contents($apiUrl);
$weatherData = $response !== false ? json_decode($response, true) : null;

$timezoneOffset = $weatherData['timezone'] ?? 0;
$localTimestamp = time() + $timezoneOffset;
$time = gmdate('F jS Y, h:i:s a', $localTimestamp);

$temp = $weatherData['main']['temp'] ?? null;
$humidity = $weatherData['main']['humidity'] ?? null;
$windSpeed = $weatherData['wind']['speed'] ?? null;
$description = $weatherData['weather'][0]['description'] ?? null;
$icon = $weatherData['weather'][0]['icon'] ?? null;
$apiStatusCode = $weatherData['cod'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2 class="title">Weather App</h2>
        <form method="post" action="">
            <input type="text" name="city" placeholder="Enter city name" required>
            <button type="submit">Get Weather</button>
        </form>

        <?php if ($weatherData): ?>
            <?php if ($apiStatusCode == 200): ?>
                <div class="weather-info">
                    <h2><?= htmlspecialchars($city) ?></h2>
                    <h4><?= $time ?></h4>

                    <div class="weather-icon">
                        <?php if ($icon): ?>
                            <img src="http://openweathermap.org/img/wn/<?= htmlspecialchars($icon) ?>@2x.png" alt="Weather Icon">
                        <?php else: ?>
                            <div class="default-icon"></div>
                        <?php endif; ?>
                    </div>

                    <div class="metrics">
                        <div class="metric">
                            <strong><?= round($temp, 2) ?> &deg;C</strong>
                        </div>
                        <div class="metric">
                            <strong><?= round($humidity) ?>%</strong><br>Humidity
                        </div>
                    </div>

                    <?php if ($description): ?>
                        <p class="desc"><?= htmlspecialchars($description) ?></p>
                    <?php endif; ?>

                    <?php if ($windSpeed !== null): ?>
                        <p class="wind">Wind Speed : <?= round($windSpeed, 2) ?> m/s</p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <p class="error"><?= htmlspecialchars($weatherData['message'] ?? 'City not found. Please try again.') ?></p>
            <?php endif; ?>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p class="error">Unable to retrieve weather data. Please check your network connection or city name.</p>
        <?php endif; ?>

        <hr>
            <div>Developed by <a href="https://www.linkedin.com/in/prabhatsharma-" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn" width="16"></a></div>
    </div>
</body>

</html>

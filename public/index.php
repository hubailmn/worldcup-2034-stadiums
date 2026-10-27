<?php
// Only the homepage is available until application routes are added.
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path !== '/' && $path !== '/index.php') {
    http_response_code(404);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Not Found';
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>World Cup 2034</title>
  </head>
  <body>
    <h1 class="title" style="margin: 10 20 50 80">World Cup 2034</h1>
  </body>
</html>

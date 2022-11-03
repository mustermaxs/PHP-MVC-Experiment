<?php

require_once "./app.php";



$app = new Application();

$app->router->get("/{view}/{controller}", function() {});
$app->router->get("/{view}", function() {});
// $app->router->get("/(view)/", []);
// $app->router->get("/main", function() {
//     return "HELLO MAIN";
// });


$app->run();

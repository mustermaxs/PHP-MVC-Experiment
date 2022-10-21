<?php
require_once "./app.php";


$app = new Application();

$app->router->get("/users", function() {
    return "HELLO USERS";
});
$app->router->get("/main9", function() {
    return "HELLO MAIN";
});


$app->run();

<?php

require_once "./app.php";
require_once "./home.php";


$app = new Application();

$app->router->get("/{view}/{controller}", function() {});
$app->router->get("/{view}", function() {});
// $app->router->get("/(view)/", []);
// $app->router->get("/main", function() {
//     return "HELLO MAIN";
// });

$mock_params = ["view"=>"users", "controller"=> "none"];
// $body = new View(null, "body");
// $body->setParams(["view"=>"main", "controller"=> "undefined"]);
// $body->render();
// $body->display();

$page = new Home($mock_params);
$page->render();
$page->display();

// $app->run();

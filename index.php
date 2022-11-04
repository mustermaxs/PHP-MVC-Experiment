<?php

require_once "./app.php";
require_once "./home.php";
require_once "./navigation.php";


$app = new Application();

$app->router->get("/{view}/{controller}", function() {});
$app->router->get("/{view}", function() {});
$app->router->get("/{view}/{user}", function() {});




// $test = "<h1>TEST{{test}}</h1>";
// echo View::renderTemplate($test, ["test"=>"markus ist brrrr"]);


$mock_params = ["content"=>"<h2>News</h2><p>Ipsum Hotel jetzt Bordell</p>"];

$p = new View($mock_params, "home");
$p->render();
$p->display();

// $page = new Home($mock_params);
// $page->render();
// $page->display();

// $app->run();

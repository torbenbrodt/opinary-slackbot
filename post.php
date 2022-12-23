<?php
require_once __DIR__ . '/vendor/autoload.php';

ini_set('max_execution_time', '20');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function pick($file) {
    $list = file("fixtures/$file");
    return trim($list[array_rand($list)]);
}

// openai: give me a list of 20 cute animals
$animal = pick("animals");
$style = pick("styles");
$background = pick("backgrounds");
$verb = pick("verbs");

// special conditions
if (date('Y-m') == '2022-12') {
    $background = "christmas tree";
}

if (date('Y-m-d') == '2023-01-01') {
    $background = "new years party";
}

$search = "A cute $animal $verb in front of a $background $style";

$channel = empty($_GET['channel']) ? "bot-test" : $_GET['channel'];
$ctrl = new Slackbot\Controller();
$ctrl->dispatch($channel, $search);


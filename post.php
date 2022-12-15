<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$day = date('Y-m-d');

// openai: give me a list of 20 cute animals
$animals = [
    "Puppies",
    "Kittens",
    "Bunnies",
    "Hamsters",
    "Guinea pigs",
    "Hedgehogs",
    "Sloths",
    "Otters",
    "Red pandas",
    "Meerkats",
    "Koalas",
    "Lemurs",
    "Foxes",
    "Deer",
    "Chipmunks",
    "Squirrels",
    "Raccoons",
    "Opossums",
    "Skunks",
    "Armadillos"
];
$animal = $animals[array_rand($animals)];

if (date('Y') == '2022') {
    $search = "some cute $animal in front of a christmas tree";
} else {
    $search = "some cute $animal having fun during new years eve";
}

$channel = empty($_GET['channel']) ? "bot-test" : $_GET['channel'];
$ctrl = new Slackbot\Controller();
$ctrl->dispatch($channel, $search);


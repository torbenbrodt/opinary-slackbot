<?php
require_once __DIR__ . '/vendor/autoload.php';

ini_set('max_execution_time', '20');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// openai: give me a list of 20 cute animals
$animals = [
    "Puppy",
    "Kitten",
    "Bunny",
    "Hamster",
    "Guinea pig",
    "Hedgehog",
    "Sloth",
    "Otter",
    "Red panda",
    "Meerkat",
    "Koala",
    "Lemur",
    "Fox",
    "Deer",
    "Chipmunk",
    "Squirrel",
    "Raccoon",
    "Opossum",
    "Skunk",
    "Armadillo"
];
$animal = $animals[array_rand($animals)];

$styles = [
    "in a photorealistic style",
    "in the style of Andy Warholas",
    "a pencil drawing",
    ", lomography",
    ", digital art",
    ", 50mm photography",
    "in the style of a Pixar animated movie",
    ", neon lights",
    "Japanese Anime",
    ", Blade Runner Cyberpunk",
    "in the 1920s, black and white photography"
];
$style = $styles[array_rand($styles)];

$backgrounds = [
    "christmas tree"
];
$background = $backgrounds[array_rand($backgrounds)];

$verbs = [
    "dancing",
    "singing"
];
$verb = $verbs[array_rand($verbs)];


// special conditions
if (date('Y-m') == '2023-12') {
    $background = "christmas tree";
}
if (date('Y-m-d') == '2023-01-01') {
    $background = "new years party";
}

$search = "A cute $animal $verb in front of a $background $style";

$channel = empty($_GET['channel']) ? "bot-test" : $_GET['channel'];
$ctrl = new Slackbot\Controller();
$ctrl->dispatch($channel, $search);


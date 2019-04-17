<?php

include __DIR__ . "/autoload.php";
include __DIR__ . "/config.php";
$title = "Guess the number";

$game = $_SESSION["GuessNum"];
$doInit = $_POST["doInit"] ?? null;
$doGuess = $_POST["doGuess"] ?? null;
$doCheat = $_POST["doCheat"] ?? null;
$guess = $_POST["guess"] ?? null;
$game->random();
$game->tries();
$number = $game->number();
$tries = $game->tries();

if (isset($doGuess)) {
    $lastres = "Out of guesses, restarting game.";
    $res = $game->makeGuess($guess);
} elseif (isset($doInit)) {
    session_destroy();
    $game = $_SESSION["GuessNum"];
    $game->random();
    $game->tries();
    $number = $game->number();
}

include __DIR__ . "/view/guess_num_post.php";

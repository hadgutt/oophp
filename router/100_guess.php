<?php
/**
 * Create routes using $app programming style.
 */
// var_dump(array_keys(get_defined_vars()));



/**
 * Init the game, redirects to play the game.
 */
$app->router->get("guess/init", function () use ($app) {
    // Init session for game
    $game = new Jogg16\Guess\Guess();
    $_SESSION["number"] = $game->number();
    $_SESSION["tries"] = $game->tries();

    return $app->response->redirect("guess/play");
});



/**
 * Play the game, shows status
 */
$app->router->get("guess/play", function () use ($app) {
    // echo "Some debugging information";
    $title = "Play the game";

    $tries = $_SESSION["tries"] ?? null;
    $res = $_SESSION["res"] ?? null;
    $guess = $_SESSION["guess"] ?? null;

    $_SESSION["guess"] = null;
    $_SESSION["res"] = null;


    $data = [
        "guess" => $guess ?? null,
        "tries" => $tries,
        "number" => $number ?? null,
        "res" => $res,
        "doGuess" => $doGuess ?? null,
        "doCheat" => $doCheat ?? null,
    ];

    $app->page->add("guess/play", $data);
    $app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Play the game, make guess
 */
$app->router->post("guess/play", function () use ($app) {
    // Incoming variables
    $guess = $_POST["guess"] ?? null;
    $doGuess = $_POST["doGuess"] ?? null;
    // $doInit = $_POST["doInit"] ?? null;
    // $doCheat = $_POST["doCheat"] ?? null;

    // Session variables
    $number = $_SESSION["number"] ?? null;
    $tries = $_SESSION["tries"] ?? null;
    $res = null;

    if ($doGuess) {
       // Guess
       $game = new Jogg16\Guess\Guess($number, $tries);
       $res = $game->makeGuess($guess);
       $_SESSION["tries"] = $game->tries();
       $_SESSION["res"] = $res;
       $_SESSION["guess"] = $guess;
   }

    return $app->response->redirect("guess/play");
});

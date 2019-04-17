<?php
/**
* Error reporting config
*/
error_reporting(-1);            // Report all errors
ini_set("display_errors", 1);   // display all errors
session_name("GuessNum");
session_start();

if (!isset($_SESSION["GuessNum"])) {
    $_SESSION["GuessNum"] = new Guess();
}

set_exception_handler(function ($e) {
    echo "<p>Anax: Uncaught exception:</p><p>Line "
        . $e->getLine()
        . " in file "
        . $e->getFile()
        . "</p><p><code>"
        . get_class($e)
        . "</code></p><p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>"
        . header("index.php");
});

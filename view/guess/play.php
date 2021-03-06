<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<h1>Guess my number (POST)</h1>

<p>Guess a number between 1 and 100, you have <?= $tries ?> tries left.</p>
<form method="POST">
    <input type="number" name="guess">
    <input type="submit" name="doGuess" value="Guess">
    <input type="submit" name="doInit" value="Reset">
    <input type="submit" name="doCheat" value="Cheat">
</form>


<?php if ($res) : ?>
    <p>Your guess <?= $guess ?> is <b><?= $res ?></b></p>
<?php endif; ?>

<?php if ($res) : ?>
    <p>CHEAT: Current number is <?= $number ?></p>
<?php endif; ?>

<?php header('url=guess_num_post.php'); ?>
<style>
<?php include 'theme.css'; ?>
</style>
<title><?= $title ?></title>

<h1>Guess my number (POST)</h1>

<p>Guess a number between 1 and 100, you have <?= $tries ?> tries left.</p>
<form method="POST">
    <input type="number" placeholder="Enter number" name="guess" min="1" max="100">
    <input type="hidden" name="number" value="<?= $number ?>">
    <input type="hidden" name="tries" value="<?= $tries ?>">
    <input type="submit" name="doGuess" value="Guess">
    <input type="submit" name="doInit" value="Reset">
    <input type="submit" name="doCheat" value="Cheat">
</form>


<?php if ($doGuess) : ?>
    <p>Your guess <?= $guess ?> is <b><?= $res ?></b></p>
<?php endif; ?>

<?php if ($doGuess && $tries === 0) : ?>
    <p><b><?= $lastres ?></b></p>
<?php endif; ?>

<?php if ($doInit) : ?>
    <p>Resetting game and session</p>
<?php endif; ?>

<?php if ($doCheat) : ?>
    <p>CHEAT: Current number is <?= $number ?></p>
<?php endif; ?>

<!--
<pre>
<?= var_dump($_POST) ?>
<?= var_dump($_SESSION) ?> -->

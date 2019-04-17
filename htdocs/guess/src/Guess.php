<?php
/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{

    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */
    public $number;
    public $tries;
    public $guess;
    public $res;
    public $lastres;

    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */

    public function __construct(int $number = -1, int $tries = 6, string $res = "placeholder", string $lastres = "Out of guesses", int $guess = null)
    {
        $this->number = rand(1, 100);
        $this->tries = $tries;
        $this->guess = $guess;
        $this->res = $res;
        $this->lastres = $lastres;
    }

    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */
    public function random()
    {
        if ($this->number === -1) {
            $this->number = rand(1, 100);
        } else {
            return $this->number;
        }
        return $this->tries;
    }

    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    public function tries()
    {
        return $this->tries;
    }


    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    public function number()
    {
        return $this->number;
    }

    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */

    public function makeGuess(int $guess = null)
    {
        if ($guess < 1 || $guess > 100) {
            throw new GuessException("Reload the page and
            enter a number in range 1-100.");
        }

        $this->tries -= 1;
        if ($this->tries === -1) {
            $this->lastres = "Out of guesses.";
            session_destroy();
        } elseif ($guess === $this->number) {
            $this->res = "Correct number!";
            session_destroy();
        } elseif ($guess < $this->number) {
            $this->res = "to low!";
        } elseif ($guess > $this->number) {
            $this->res = "to high!";
        }
        return $this->res;
    }
}

<?php

$position = $_GET['board'];
$squares = $position;

class Game {

    var $position;

    function __construct($squares) {
        $this->position = str_split($squares);
    }

    function winner($token) {
        $won = false;
        for ($row = 0; $row < 3; $row++) { //check for vertical and horizontal 
            if (($this->position[3 * $row] == $token) && ($this->position[3 * $row + 1] == $token) && ($this->position[3 * $row + 2] == $token)) {
                $won = true;
            } else if (($this->position[$row] == $token) && ($this->position[$row + 3] == $token) && ($this->position[$row + 6] == $token)) {
                $won = true;
            }
        }
        //check for 2 diagonal 
        if (($this->position[0] == $token) &&
                ($this->position[4] == $token) &&
                ($this->position[8] == $token)) {
            $won = true;
        } else if (($this->position[2] == $token) &&
                ($this->position[4] == $token) &&
                ($this->position[6] == $token)) {
            $won = true;
        }
        return $won;
    }

}

$game = new Game($squares);
if ($game->winner('x'))
    echo 'X wins';
else if ($game->winner('o'))
    echo 'O wins';
else
    echo 'No winner yet';
?>
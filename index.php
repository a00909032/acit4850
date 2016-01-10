<?php

//no initial param or empty value starts a new game
$position = isset($_GET['board']) ? $_GET['board'] : '---------';
if (empty($position)) {
    $position = '---------';
}
$squares = $position;

class Game {

    var $position;

    function __construct($squares) {
        $this->position = str_split($squares);
    }

    function show_cell($which) {
        $token = $this->position[$which];
        if ($token <> '-') {
            return '<td>' . $token . '</td>';
        }
        $this->newposition = $this->position;
        $this->newposition[$which] = $this->pick_move(); //make movement
        $move = implode($this->newposition);
        $link = '/acit4850-lab1/index.php?board=' . $move;
        return '<td><a href="' . $link . '">-</a></td>';
    }

    function pick_move() {
        $array = $this->position; //pass array into a variable for easier use
        $counts = array_count_values($array); //count variables in the array
        if (isset($counts['x'])) { //if x exists, count
            $xnumber = $counts['x'];
        } else { //otherwise set x to 0 to avoid error msgs
            $xnumber = 0;
        }
        if (isset($counts['o'])) {
            $onumber = $counts['o'];
        } else {
            $onumber = 0;
        }

        if ($xnumber <= $onumber) {
            return 'x';
        } else if ($xnumber > $onumber) {
            return 'o';
        }
    }

    function display() {
        echo '<table cols="3" style="font-size:large; font-weight:bold;">';
        echo '<tr>';
        for ($pos = 0; $pos < 9; $pos++) {
            echo $this->show_cell($pos);
            if ($pos % 3 == 2)
                echo '</tr></tr>';
        }
        echo '</tr>';
        echo '</table>';
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
        //check for 2 diagonals
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

if ($game->winner('x')) {
    echo 'X wins';
} else if ($game->winner('o')) {
    echo 'O wins';
} else {
    echo 'No winner yet';
}
$game->display();
?>
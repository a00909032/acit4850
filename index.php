<?php

$position = $_GET['board'];
$squares = str_split($position);

function winner($token, $position) {
    $won = false;
    for ($row = 0; $row < 3; $row++) { //check for vertical and horizontal 
        if (($position[3 * $row] == $token) && ($position[3 * $row + 1] == $token) && ($position[3 * $row + 2] == $token))
            $won = true;
        else if (($position[$row] == $token) && ($position[$row + 3] == $token) && ($position[$row + 6] == $token))
            $won = true;
    }
    //check for 2 diagonal 
    if (($position[0] == $token) &&
            ($position[4] == $token) &&
            ($position[8] == $token)) {
        $won = true;
    } else if (($position[2] == $token) &&
            ($position[4] == $token) &&
            ($position[6] == $token)) {
        $won = true;
    }

    /*
      $won = false;
      if (($position[0] == $token) &&
      ($position[1] == $token) &&
      ($position[2] == $token)) {
      $won = true;
      } else if (($position[3] == $token) &&
      ($position[4] == $token) &&
      ($position[5] == $token)) {
      $won = true;
      } else if (($position[6] == $token) &&
      ($position[7] == $token) &&
      ($position[8] == $token)) {
      $won = true;
      } else if (($position[0] == $token) &&
      ($position[3] == $token) &&
      ($position[6] == $token)) {
      $won = true;
      } else if (($position[1] == $token) &&
      ($position[4] == $token) &&
      ($position[7] == $token)) {
      $won = true;
      } else if (($position[2] == $token) &&
      ($position[5] == $token) &&
      ($position[8] == $token)) {
      $won = true;
      } else if (($position[0] == $token) &&
      ($position[4] == $token) &&
      ($position[8] == $token)) {
      $won = true;
      } else if (($position[2] == $token) &&
      ($position[4] == $token) &&
      ($position[6] == $token)) {
      $won = true;
      } */
    return $won;
}

if (winner('x', $squares))
    echo 'X win.';
else if (winner('o', $squares))
    echo 'O win.';
else
    echo 'No winner yet.';
?>
<?php

class DotAreaChecker {
    function check($x, $y, $r) : bool {
        if($x <= 0 && $y >= 0) {
            return ($x >= -$r && $y < $r);
        } else if($x <= 0) {
            return ($y > -$x - 0.5 * $r);
        } else if($y >= 0) {
            return (($x ** 2 + $y ** 2) <= ($r / 2) ** 2);
        }
        return false;
    }
}

?>
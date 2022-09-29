<?php

function die_with($code) {
    http_response_code($code);
    die();
}

class ValidDataExtractor {
    private $MIN_X_RANGE = -3;
    private $MAX_X_RANGE = 5;

    private $MIN_Y_RANGE = -5;
    private $MAX_Y_RANGE = 5;

    private $MIN_R_RANGE = 1;
    private $MAX_R_RANGE = 3;

    function __construct($method) {
        if($_SERVER['REQUEST_METHOD'] != $method) {
            die_with(405);
        }
    }

    function extract_rows() {
        $size = filter_var($_POST['rows'], FILTER_VALIDATE_INT);
        if($size === false) {
            die_with(400);
        }
        return $size;
    }

    function extract_x() {
        $x = filter_var($_POST['x'], FILTER_VALIDATE_INT,
                            array("options" => array(
                                "min_range" => $this->MIN_X_RANGE,
                                "max_range" => $this->MAX_X_RANGE
                            )));
    
        if($x === false) {
            die_with(400);
        }
        return $x;
    }
    
    private function extract_valid_float($name, $min, $max) {
        $float = filter_var($_POST[$name], FILTER_VALIDATE_FLOAT,
                            array("options" => array(
                                "min_range" => $min,
                                "max_range" => $max
                            )));
        if($float === false) {
            die_with(400);
        }
    
        return $float;
    }
    
    function extract_y() {
        return $this->extract_valid_float('y', $this->MIN_Y_RANGE, $this->MAX_Y_RANGE);
    }
    
    function extract_r() {
        $r = $this->extract_valid_float('r', $this->MIN_R_RANGE, $this->MAX_R_RANGE);
        
        if($r - floor($r) != 0.5 && $r != floor($r)) {
            die_with(400);
        }
    
        return $r;
    }
}
?>
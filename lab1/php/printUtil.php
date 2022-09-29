<?php
function print_cell($data, $h=false) {
    if($h) {
        echo "<th>" . $data . "</th>";
    } else {
        echo "<td>" . $data . "</td>";
    }
}

function print_header() {
    echo "<tr>";
    print_cell("date", true);
    print_cell("x", true);
    print_cell("y", true);
    print_cell("r", true);
    print_cell("miss", true);
    print_cell("duration", true);
    echo "</tr>";
}

function print_row($row, $time, $h=false) {
    echo "<tr>";
    date_default_timezone_set("Europe/Moscow");
    print_cell(date("d-m-Y H:i:s", $time), $h);
    print_cell($row["x"], $h);
    print_cell($row["y"], $h);
    print_cell($row["r"], $h);
    print_cell(var_export($row["status"], true), $h);
    print_cell(round($row["duration"], 6), $h);
    echo "</tr>";
}

function print_table($data = array(), $expected_size = -1, $error = false, $error_message = "no error") {
    echo "<table>";
    print_header();
    if($error) {
        echo "<tr><td colspan=6>".$error_message."</td></tr>";
    } else {
        foreach($data as $time=>$row) { 
            print_row($row, $time);
        }
        for($i = count($data); $i < $expected_size; $i++) {
            echo "<tr class=\"loading\">";
            for($k = 0; $k < 6; $k++) {
                echo "<td> </td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
}
?>
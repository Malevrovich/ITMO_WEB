<?php
require_once __DIR__ . "/classes/ValidDataExtractor.php";
require_once __DIR__ . "/classes/DotAreaChecker.php";
require_once __DIR__ . "/classes/InfluxDAO.php";
require_once __DIR__ . "/classes/AuthManager.php";
require_once __DIR__ . "/printUtil.php";

$error = false;
$error_message = "no error";
$data = array();
    
try {    
    $start = microtime(true);

    $extractor = new ValidDataExtractor("POST");

    $x = $extractor->extract_x();
    $y = $extractor->extract_y();
    $r = $extractor->extract_r();
    $rows = $extractor->extract_rows();

    $checker = new DotAreaChecker();
    $status = !$checker->check($x, $y, $r);

    $duration = microtime(true) - $start;

    $uid = (new AuthManager())->getUid();

    $influxDAO = new InfluxDAO();
    $influxDAO->writeHit(
        array(
            "x" => $x,
            "y" => $y,
            "r" => $r,
            "status" => $status,
            "duration" => $duration
        ), $uid
    );

    $expected_size = $rows + 1;

    $data = $influxDAO->getResults($uid);
} catch(InfluxDB2\ApiException $e) {
    $error = true;
    $error_message = "<tr><td colspan=6> Unable to connect to the database </td></tr>";
} catch(Exception $e) {
    $error = true;
    $error_message = "<tr><td colspan=6> Error!!!! " . $e->getMessage() . " </td></tr>";
}

print_table($data, $expected_size, $error, $error_message);
?>
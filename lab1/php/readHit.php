<?php
require_once __DIR__ . "/classes/InfluxDAO.php";
require_once __DIR__ . "/classes/AuthManager.php";
require_once __DIR__ . "/printUtil.php";

$data = array();
$expected_size = 0;

try {
    $error = false;
    $error_message = "no errors";
    $dao = new InfluxDAO();
    $uid = (new AuthManager())->getUid();

    $data = $dao->getResults($uid);
    $expected_size = count($data);
} catch(InfluxDB2\ApiException $e) {
    $error_message = "<tr><td colspan=6> Unable to connect to the database </td></tr>";
} catch(Exception $e) {
    $error_message = "<tr><td colspan=6> Error!!!! " . $e->getMessage() . " </td></tr>";
}

print_table($data, $expected_size, $error, $error_message);
?>
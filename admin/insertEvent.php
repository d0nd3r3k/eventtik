<?php
include('../inc/config.php');
include('../inc/db.php');

$db = new edb();


$eventName = $_POST['eventName'];
$eventLocation = $_POST['eventLocation'];
$eventType = $_POST['eventType'];
$eventDesc = $_POST['eventDesc'];
$eventDate = $_POST['eventDate'];

//Theater Setup
$theater = array();
$eventRows = $_POST['eventRows'];
$eventCols = $_POST['eventCols'];
$eventZone = $_POST['eventZone'];
$eventPrice = $_POST['eventPrice'];

array_push($theater, $eventRows, $eventCols, $eventZone, $eventPrice );
$json = json_encode($theater);

$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
if ($fn) {
    // AJAX call
    file_put_contents(
            'uploads/' . $fn, file_get_contents('php://input')
    );
    echo "$fn uploaded";
    exit();
} else {
    // form submit
    $files = $_FILES['fileselect'];
    foreach ($files['error'] as $id => $err) {
        if ($err == UPLOAD_ERR_OK) {
            $fn = $files['name'][$id];
            move_uploaded_file(
                    $files['tmp_name'][$id], 'uploads/' . $fn
            );
            echo "<p>File $fn uploaded.</p>";
        }
    }
}
$db->insertEvent($eventName, $eventLocation, $json, $eventType, $fn, $eventDesc, $eventDate);
?>
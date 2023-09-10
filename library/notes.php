<?php
include "../mainconfig.php";
$sql            = mysqli_query($call, "SELECT * FROM notes WHERE NOT description='todo'");
$result         = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $data[]     = $row;
}
echo json_encode(array("result" => $data));

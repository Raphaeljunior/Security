<?php
include 'connectionManager.php';
include 'requestManager.php';
$newConnManger = new connectionManager();
$conn = $newConnManger->Connect();
if ($conn != "err"){
    $newReqManager = new requestManager();
    $list = $newReqManager->GetEmptySpace($conn);
    echo json_encode($list);

}


?>
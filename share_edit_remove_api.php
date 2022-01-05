<?php

require __DIR__. '/parts/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
];

// $share_id = isset($_POST['share_id']) ? intval($_POST['share_id']) : 0;
// if(empty($share_id)) {
//     $output['code'] = 400;
//     $output['error'] = '沒有 share_item_id';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
// }

$title = $_POST['title'] ?? '';
$pic = $_FILES['pic'] ?? '';
$desc = $_POST['desc'] ?? '';
$htags = $_POST['htags'] ?? ''; //array
$status = '1';
$filename = $_POST['deleteImg'] ?? '';
$dbfilename = $_POST['dbImg'] ?? '';
$itemId = $_POST['itemId'] ?? '';

$output['filename']=$filename;


$filearray = explode( ',', $dbfilename )?? '' ;


// $finalarray = array_filter($filearray ,function($k) {
//     return $k != $_POST['deleteImg'];
// }); 

// $output['dbfilename']=$finalarray;


if (($key = array_search($filename, $filearray)) !== false) {
    unset($filearray[$key]);
};

$output['dbfilename']=array_values($filearray);





// // TODO: 檢查欄位資料
// if(empty($title)) {
//     $output['code'] = 401;
//     $output['error'] = '請輸入正確標題';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
// }
// if(empty($pic)) {
//     $output['code'] = 403;
//     $output['error'] = '請上傳照片';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
// }
// if(empty($desc)) {
//     $output['code'] = 405;
//     $output['error'] = '請輸入敘述';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE); exit;
// }

// // TODO: 照片路徑
// // TODO: HASHTAG 轉換

$sql = "UPDATE `share_item` SET 
                          `share_img`=?
                          
                          
WHERE `share_item_id`=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
  
    implode(",",$filearray)?? '',
    $itemId,
]);
$output['success'] = true;

// if($stmt->rowCount()==0){
//     $output['error'] = '資料沒有修改';
// } else {
//     $output['success'] = true;
// }

echo json_encode($output, JSON_UNESCAPED_UNICODE);
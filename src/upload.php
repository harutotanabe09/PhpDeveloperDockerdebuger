<?php
require "function.php";

$file_tmp  = $_FILES["fileToUpload"]["tmp_name"];
$file_save = getcwd() . "/". $_FILES["fileToUpload"]["name"];
//$result = @move_uploaded_file($file_tmp, $file_save);

// POSTしたとき
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $filename = "data01.txt";
    $download = "downloadfile.csv";
    $getcsv = getfile($file_save);
    writefile($filename, $getcsv);
    //downloadfile($filename, $download);
    echo "UPLOAD OK";
}

?>
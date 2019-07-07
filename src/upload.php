<?php
require "function.php";

// POSTしたとき
if (isset($_POST["submit"])) {
    $getcsv = getfile($_FILES["fileToUpload"]["tmp_name"]);
    writefile("./data.txt", $getcsv);
    downloadfile('data.txt', 'downloadfile.txt');
}

?>
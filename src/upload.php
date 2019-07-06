<?php
if(isset($_POST["submit"])) {
    //　ファイルデータ取得
    $updloadfile = $_FILES["fileToUpload"]["tmp_name"];
    $data = file_get_contents($updloadfile);
    $data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
    $temp = tmpfile();
    // CSV データ
    $csv  = array();
    fwrite($temp, $data);
    rewind($temp);
    // データ読込
    while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
        // 列追加
        $data = $data + array( 5 => "add column" );
        $csv[] = $data;
    }
    // データ読込の後処理
    fclose($temp);

    // Dump
    // var_dump($csv);

    //　データ書込
    $file = fopen("data.txt", "w");
    // データ書き込み処理
    foreach($csv as $key => $value){
        // value[0]: 1列目
        fwrite($file, $value[5] . "," .  $value[0] . "," .  $value[3] ."\n");
     }
    }
    //ダウンロードをしたいファイル名のパス
    $file_name = 'data.txt';
    $file_path = dirname(__FILE__).'/'.$file_name;
    //ダウンロード時のファイル名
    $download_file_name = 'download.txt';
    //タイプをダウンロードと指定
    header('Content-Type: application/octet-stream;');
    header('Content-Disposition: attachment; filename="'.$download_file_name.'"');
    //ファイルを読み込んでダウンロード
    readfile($file_path);
    exit;
?>

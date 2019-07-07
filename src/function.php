<?php

/**
 * ファイルデータをArrayに変換
 *
 * @param File file
 * @return array
 */
function getfile($uploadfile){
    //　ファイルデータ取得
    $updloadfile = $uploadfile;
    $data = file_get_contents($updloadfile);
    $data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
    $temp = tmpfile();
    // CSV データ準備
    $csv  = array();
    fwrite($temp, $data);
    rewind($temp);
    // データ読込(ヘッダースキップ)
    $flag = true;
    while (($data = fgetcsv($temp, 0, ",")) !== FALSE) {
        // ヘッダー処理
        if($flag) {
            $flag = false; continue;
        }
        // 列追加
        $data = $data + array( "add key" => "add function outsider keys" );
        $csv[] = $data;
    }
    // データ読込の後処理
    fclose($temp);
    return $csv;
}

/**
 * ファイル出力
 *
 * @param string outputfilepath
 * @param Array data
 */
function writefile($outputfile , $data){
    $handle = fopen($outputfile, 'w');
    // データ書き込み処理
    foreach($data as $key => $value){
        // value[0]: 1列目
        fwrite($handle, $value["add key"] . "," .  $value[0] . "," .  $value[3] ."\n");
     }
     fclose($handle);
}

/**
 * ファイルをダウンロード
 *
 * @param string inputfile
 * @param string outputfile
 */
function downloadfile($inputfile,$outputfile){
    //ダウンロードをしたいファイル名のパス
    $file_name = $inputfile;
    $file_path = dirname(__FILE__).'/'.$file_name;
    //タイプをダウンロードと指定
    header('Content-Type: application/octet-stream;');
    header('Set-Cookie: fileLoading=true'); 
    header('Content-Disposition: attachment; filename="'.$outputfile.'"');
    //ファイルを読み込んでダウンロード
    readfile($file_path);
    exit();
}

?>